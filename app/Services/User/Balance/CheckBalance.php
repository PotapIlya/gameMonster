<?php

namespace App\Services\User\Balance;


use App\Exceptions\BuyKeyException;
use App\Http\Controllers\Controller;
use App\Models\Admin\HistoryPayments;
use http\Params;
use Illuminate\Http\Request;
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


final class CheckBalance{


	public function checkCookie(array $array = null)
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

			if ($query && $query->type === 'paypal')
			{
				return $this->paypal($query, $array);
			}
			if ($query && $query->type === 'qiwi')
			{
				return $this->qiwi($query);
			}

			throw new BuyKeyException();
		}

		return redirect()->back();

	}


//	private function updateMoney()
//	{
//
//	}


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
				throw new BuyKeyException();
			}
		}
		else{
			throw new BuyKeyException();
		}
	}


	/**
	 * @param object $query
	 * @param array $array
	 */
	private function paypal(object $query, ?array $array)
	{
//		if ($array && is_null($array))
//		{
//			throw new BuyKeyException();
//		}

		$paypal = new ApiContext(new OAuthTokenCredential(
				config('payment.paypal.client_id'),
				config('payment.paypal.secret'))
		);
		$paypal->setConfig(config('payment.paypal.settings'));

		$paymentId = Cookie::get('billId');
		$payerId = Cookie::get('id');

		$payment = Payment::get( Cookie::get('billId'), $paypal );
		$execute = new PaymentExecution();
		$execute->setPayerId(Cookie::get('id'));

//		dd($payment->create($paypal)->getState());
		try
		{

			$result = $payment->create($paypal)->getState();

			dd($payment->create($paypal)->getState(), 12);
		}
		catch (\PayPal\Exception\PayPalConnectionException $ex) {

//			dd( $ex->getCode() ); // Prints the Error Code
			dd( $ex->getData(), 'getData' ); // Prints the detailed error message


		} catch (\Exception $ex) {
			dd($ex);
		}
		dd(12);

		dd( $payment->execute($execute, $paypal) );



		try{


		    $result = $payment->execute($execute, $paypal);



		   $transactions = $payment->getTransactions();
		   $resources = $transactions[0]->getRelatedResources();

		   $sale = $resources[0]->getSale();
		   $saleID = $sale->getId();
		   }catch(PayPalConnectionException $e){
			dd(12);
		       echo $e->getCode(); // Prints the Error Code
		       echo $e->getData();
		       die($e);
		   }catch (Exception $ex) {
		       die($ex);
		   }

	}










//	/**
//	 * @param Payment $payment
//	 * @param Request $request
//	 * @return \Illuminate\Http\RedirectResponse
//	 */
//	public function paypal(Payment $payment)
//	{
//		dd(12);
//		/** Получаем ID платежа до очистки сессии **/
//		$payment_id = Session::get('paypal_payment_id');
//		/** Очищаем ID платежа **/
//		Session::forget('paypal_payment_id');
//
//		if (empty($request->PayerID) || empty($request->token)) {
//			session()->flash('error', 'Payment failed');
//			return Redirect::route('/');
//		}
//
//		$payment = Payment::get($payment_id, $this->_api_context);
//		$execution = new PaymentExecution();
//		$execution->setPayerId($request->PayerID);
//
//		/** Выполняем платёж **/
//		$result = $payment->execute($execution, $this->_api_context);
//
//		if ($result->getState() == 'approved') {
//			session()->flash('success', 'Платеж прошел успешно');
//			return Redirect::route('/');
//		}
//
//		session()->flash('error', 'Платеж не прошел');
//		return Redirect::route('/');
//	}
//
//
//	/**
//	 * @return \Illuminate\Http\RedirectResponse
//	 * @throws \ErrorException
//	 * @throws \Qiwi\Api\BillPaymentsException
//	 */
//	public function qiwi()
//	{
//
//		if ( !is_null(Cookie::get('billId')) && Cookie::get('billId')
//			&&
//			!is_null(Cookie::get('id')) && Cookie::get('id')
//			&&
//			(int) Cookie::get('id') === Auth::id() )
//		{
//			$billPayments = new \Qiwi\Api\BillPayments(config('payment.qiwi.secret_key'));
//			$status = $billPayments->getBillInfo( Cookie::get('billId') );
//
//			// DB
//			$query = HistoryPayments::where('billId', Cookie::get('billId'))->first();
//			if ( $query && !$query->status )
//			{
//				if ($status && $status['status']['value'] === 'PAID')
//				{
//
//					$query->update(['status' => 1]);
//					$userAbout = Auth::user()->about;
//
//					$update = $userAbout->update([
//						'money' => explode('.', $status['amount']['value'])[0] + $userAbout->money
//					]);
//					if ($update){
//						return redirect()->route('user.index')
//							->withCookie(\Cookie::forget('billId'))
//							->withCookie(\Cookie::forget('id'));
//					}
//				}
//				else{
//					throw new BuyKeyException();
//				}
//			}
//			else{
//				throw new BuyKeyException();
//			}
//		}
//
//		throw new BuyKeyException();
//
//	}

}

























