<?php

namespace App\Services\User\Balance;


use App\Exceptions\BuyKeyException;
use App\Http\Controllers\Controller;
use App\Models\Admin\HistoryPayments;
use Illuminate\Http\Request;
use Mockery\Exception;
use PayPal\Api\FundingInstrument;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\PayerInfo;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Redirect;
use Cookie;
use Auth;


final class CheckBalance
{


	/**
	 * @param string $name
	 * @param array|null $array
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|int|void
	 * @throws BuyKeyException
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 */
	public function checkCookie(string $name, array $array = null)
	{


		if ( !is_null(Cookie::get('billId')) && Cookie::get('billId')
			&&
			!is_null(Cookie::get('id')) && Cookie::get('id')
			&&
			(int) Cookie::get('id') === Auth::id() )
		{

			$query = HistoryPayments::where('billId', Cookie::get('billId'))
				->where('status', 0)
				->first();

			if ($query && $query->type === 'paypal') // $name === 'paypal'
			{
				return $this->paypal($query, $array);
			}
			else if ($query && $query->type === 'qiwi')
			{
				return $this->qiwi($query);
			}
			else if ($query && $query->type === 'payeer')
			{
				return$this->payeer($query, $array);
			}

			throw new BuyKeyException();
		}
		else
		{
			throw new BuyKeyException();
		}


	}


	/**
	 * @param object $query
	 * @param array $array
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws BuyKeyException
	 */
	public function payeer(object $query, array $array)
	{
		if (!count($array))
		{
			throw new BuyKeyException();
		}

		$m_key = config('payment.payeer.secret_key');
		$arHash = [
			$array['m_operation_id'],
			$array['m_operation_ps'],
			$array['m_operation_date'],
			$array['m_operation_pay_date'],
			$array['m_shop'],
			$array['m_orderid'],
			$array['m_amount'],
			$array['m_curr'],
			$array['m_desc'],
			$array['m_status'],
			$m_key
		];
		$sign_hash = strtoupper(hash('sha256', implode(':', $arHash)));

		if ($array['m_sign'] === $sign_hash && $array['m_status'] === 'success')
		{
			$userAbout = Auth::user()->about;
			if ($userAbout){
				$query->update(['status' => 1]);
			}

			$update = $userAbout->update([
				'money' => explode('.', $array['m_amount'])[0] + $userAbout->money
			]);
			if ($update){
				return redirect()->route('user.index')
					->withCookie(Cookie::forget('billId'))
					->withCookie(Cookie::forget('id'));
			}
		}
	}


	/**
	 * @param object $query
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws BuyKeyException
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 */
	private function qiwi(object $query)
	{
		$billPayments = new \Qiwi\Api\BillPayments(config('payment.qiwi.secret_key'));
		$status = $billPayments->getBillInfo( Cookie::get('billId') );

		if ( $query && !$query->status )
		{
			if ($status && $status['status']['value'] === 'PAID')
			{
				$query->update(['status' => 1]);
				$userAbout = Auth::user()->about;

				$update = $userAbout->update([
					'money' => explode('.', $status['amount']['value'])[0] + $userAbout->money
				]);
				if ($update){
					return redirect()->route('user.index')
						->withCookie(Cookie::forget('billId'))
						->withCookie(Cookie::forget('id'));
				}
			}
			else{
//				throw new BuyKeyException('', 500);
				throw new BuyKeyException();
			}
		}
		else{
			throw new BuyKeyException();
		}
	}


	/**
	 * @param object $query
	 * @param array|null $array
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws BuyKeyException
	 */
	private function paypal(object $query, ?array $array)
	{
		try
		{
			$paypal = new ApiContext(new OAuthTokenCredential(
					config('payment.paypal.client_id'),
					config('payment.paypal.secret'))
			);
			$paypal->setConfig(config('payment.paypal.settings'));

			$paymentId = Cookie::get('billId');
			$payerId = Cookie::get('id');

			$payment = Payment::get(Cookie::get('billId'), $paypal);
			$execute = new PaymentExecution();
			$execute->setPayerId(Cookie::get('id'));


			/** Выполняем платёж **/
			$result = $payment->execute($execute, $paypal);

			if ($result->getState() === 'approved')
			{
				$userAbout = Auth::user()->about;
				if ($userAbout){
					$query->update(['status' => 1]);
				}else{
					throw new BuyKeyException();
				}

				$update = $userAbout->update([
					'money' =>  $query['money'] + $userAbout->money,
				]);
				if ($update){
					return redirect()->route('user.index')
						->withCookie(Cookie::forget('billId'))
						->withCookie(Cookie::forget('id'));
				} else{
					throw new BuyKeyException();
				}
			} else{
				throw new BuyKeyException();
			}
		}
		catch (Exception $e)
		{
			throw new BuyKeyException();
		}


	}

}

























