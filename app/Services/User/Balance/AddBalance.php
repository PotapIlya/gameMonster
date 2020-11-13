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


final class AddBalance{


	/**
	 * @param array $array
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws BuyKeyException
	 */
	public function paypal(array $array)
	{

//		$paypal = new ApiContext(new OAuthTokenCredential(
//				config('payment.paypal.client_id'),
//				config('payment.paypal.secret'))
//		);
//		$paypal->setConfig(config('payment.paypal.settings'));
//
//		$amountToBePaid = 100;
//		$payer = new Payer();
//		$payer->setPaymentMethod('paypal');
//
//		$item_1 = new Item();
//		$item_1->setName('Mobile Payment') /** название элемента **/
//		->setCurrency('RUB')
//			->setQuantity(1)
//			->setPrice($amountToBePaid); /** цена **/
//
//		$item_list = new ItemList();
//		$item_list->setItems(array($item_1));
//
//		$amount = new Amount();
//		$amount->setCurrency('RUB')
//			->setTotal($amountToBePaid);
//
//		$redirect_urls = new RedirectUrls();
//		/** Укажите обратный URL **/
//		$redirect_urls->setReturnUrl( route('statusPayment') )
//			->setCancelUrl( route('statusPayment') );
//
//		$transaction = new Transaction();
//		$transaction->setAmount($amount)
//			->setItemList($item_list)
//			->setDescription('Описание транзакции');
//
//		$payment = new Payment();
//		$payment->setIntent('Sale')
//			->setPayer($payer)
//			->setRedirectUrls($redirect_urls)
//			->setTransactions(array($transaction));
//		try {
//			$payment->create($paypal);
//		} catch (\Exception $ex) {
//			if (\Config::get('app.debug')) {
//				\Session::put('error', 'Таймаут соединения');
//				return Redirect::route('/');
//			} else {
//				\Session::put('error', 'Возникла ошибка, извините за неудобство');
//				return Redirect::route('/');
//			}
//		}
//
//		foreach ($payment->getLinks() as $link) {
//			if ($link->getRel() == 'approval_url') {
//				$redirect_url = $link->getHref();
////				dd($redirect_url);
//				return redirect( $redirect_url );
//			}
//		}
//
//		/** добавляем ID платежа в сессию **/
//		\Session::put('paypal_payment_id', $payment->getId());
//
//		if (isset($redirect_url)) {
//			/** редиректим в paypal **/
//			return Redirect::away($redirect_url);
//		}
//
//		\Session::put('error', 'Произошла неизвестная ошибка');
//		return Redirect::route('/');


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
		$successRedirectUrls->setReturnUrl(route('statusPayment'))
			->setCancelUrl(route('statusPayment'));
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
//			dd($payment->create($paypal));

//			dd($payment->getLinks());
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

		try
		{
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

//			$create = HistoryPayments::create([
//				'user_id' => Auth::id(),
//				'money' => $request['money'],
//				'billId' => $billId,
//				'type' => 'qiwi',
//				'status' => false,
//			]);

			if ( $this->createRecord( (int) $request['money'], $billId, 'qiwi') )
			{
				return redirect($response['payUrl'])
					->withCookie('billId', $billId)
					->withCookie('id', Auth::id());
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

























