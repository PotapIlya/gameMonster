<?php

namespace App\Services\User\Balance;

use App\Exceptions\BuyKeyException;
use App\Models\Admin\HistoryPayments;
use Composer\Command\ExecCommand;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\Exception;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use Auth;


final class AddBalance
{


	/**
	 * @param array $array
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws BuyKeyException
	 */
	public function payeer(array $array)
	{
		$m_shop =  '1208424255';
		$m_orderid = md5(rand(1, getrandmax()).date('d.m.Y:g:i').rand(1, getrandmax()));
		$m_amount = number_format($array['money'], 2, '.', '');
		$m_curr = 'RUB';
		$m_desc = base64_encode('Пополнение баланса');
		$m_key = config('payment.payeer.secret_key');


		$sign = strtoupper(hash('sha256', implode(':', [
			$m_shop,
			$m_orderid,
			$m_amount,
			$m_curr,
			$m_desc,
			$m_key
		])));

		$link = 'https://payeer.com/merchant/?m_shop='.$m_shop.'&m_orderid='.$m_orderid.'&m_amount='.$m_amount.'&m_curr='.$m_curr.'&m_desc='.$m_desc.'&m_sign='.$sign;


		if($m_amount !== 0)
		{
			if ( $this->createRecord( (int) $array['money'], $m_orderid, 'payeer' ) )
			{
//				dd($sign);
				return redirect( $link )
					->withCookie('billId', $m_orderid )
					->withCookie('id', Auth::id());
			}
		}
	}

	/**
	 * @param array $array
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws BuyKeyException
	 */
	public function paypal(array $array)
	{

		$paypal = new ApiContext(new OAuthTokenCredential(
				config('payment.paypal.client_id'),
				config('payment.paypal.secret'))
		);
		$paypal->setConfig(config('payment.paypal.settings'));

		$amount = new Amount();
		$item_list = new ItemList();
		$item_1 = new Item();
		$payer = new Payer();
		$successRedirectUrls = new RedirectUrls();
		$transaction = new Transaction();
		$payment = new Payment();


		$payer->setPaymentMethod('paypal');

		$item_1->setName('Mobile Payment')
			->setCurrency('RUB')
			->setQuantity(1)
			->setPrice($array['money']);

		$item_list->setItems([$item_1]);

		$amount->setCurrency('RUB')
			->setTotal($array['money']);


		// create success url
		$successRedirectUrls->setReturnUrl(route('statusPayment', 'paypal'))
			->setCancelUrl(route('statusPayment', 'paypal'));
		//
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Описание транзакции');

		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($successRedirectUrls)
			->setTransactions([$transaction]);


		try
		{
			$payment->create($paypal);

			foreach ($payment->getLinks() as $link)
			{
				if ($link->getRel() === 'approval_url')
				{
					if ( $this->createRecord( (int) $array['money'], $payment->getId(), 'paypal' ) )
					{
						return redirect( $link->getHref() )
							->withCookie('billId', $payment->getId() )
							->withCookie('id', Auth::id());
					}
				}
			}
		}
		catch (Exception $e)
		{
			throw new BuyKeyException();
		}
	}


	/**
	 * @param array $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws BuyKeyException
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 */
	public function qiwi(array $request)
	{
//		$balance = $qiwi->getBalance();
		try
		{
			//
			$billPayments = new \Qiwi\Api\BillPayments(config('payment.qiwi.secret_key'));
			$billId = $billPayments->generateId();

			$response = $billPayments->createBill($billId,
				[
					'amount' => $request['money'],
					'currency' => 'RUB',
					'expirationDateTime' => $billPayments->getLifetimeByDay(1),
					'account' => \Auth::id(),
					'successUrl' => config('payment.qiwi.success_url'),
				]);


			if ( $this->createRecord( (int) $request['money'], $billId, 'qiwi') )
			{
				return redirect($response['payUrl'])
					->withCookie('billId', $billId)
					->withCookie('id', Auth::id());
			} else {
				throw new BuyKeyException();
			} 


		}
		catch (ModelNotFoundException $exception)
		{
			throw new BuyKeyException();
		}

	}

	private function createRecord(int $money, string $billId, string $type) : object
	{
		return HistoryPayments::create([
			'user_id' => Auth::id(),
			'money' => $money,
			'billId' => $billId,
			'type' => $type,
			'status' => false,
		]);
	}





}

























