<?php

namespace App\Services\User\Balance;


use App\Exceptions\BuyKeyException;
use App\Http\Controllers\Controller;
use App\Models\Admin\HistoryPayments;
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


	public function checkCookie()
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
				return $this->paypal($query);
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


	private function paypal(object $query)
	{

		$paypal = new ApiContext(new OAuthTokenCredential(
				config('payment.paypal.client_id'),
				config('payment.paypal.secret'))
		);
		$paypal->setConfig(config('payment.paypal.settings'));


		$paymentId = Cookie::get('billId');
		$payerId = (int) Cookie::get('id');
//		dd($paymentId, $payerId);

		try{
		    $payment = Payment::get($paymentId, $paypal);

		    $execute = new PaymentExecution();
		    $execute->setPayerId($payerId);

		    dd( $payment->execute($execute, $paypal) );

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


//		$ccToken->setCreditCardId(Cookie::get('billId'));

//		$ccToken = Cookie::get('billId');
//		$fi = new FundingInstrument();
//		$fi->setCreditCardToken($ccToken);
//
//		$payer = new Payer();
//		$payer->setPaymentMethod("credit_card");
//		$payer->setFundingInstruments(array($fi));
//
//		// Specify the payment amount.
//		$amount = new Amount();
//		$amount->setCurrency('RUB');
//		$amount->setTotal(10);
//		// ###Transaction
//		// A transaction defines the contract of a
//		// payment - what is the payment for and who
//		// is fulfilling it. Transaction is created with
//		// a `Payee` and `Amount` types
//		$transaction = new Transaction();
//		$transaction->setAmount($amount);
////		$transaction->setDescription($paymentDesc);
//
//		$payment = new Payment();
//		$payment->setIntent("sale");
//		$payment->setPayer($payer);
//		$payment->setTransactions(array($transaction));

//		try {
//			dd( $payment->create($paypal) );
//		} catch (PayPal\Exception\PayPalConnectionException $e) {
//			echo $e->getData(); // This will print a JSON which has specific details about the error.
//			exit;
//		}
//////////////////////////////////////////////////////////////////////////////////////////////////////
///
//		$payment_id = Cookie::get('billId');
//
//
//		$payment = Payment::get($payment_id, $paypal);
//
//		dd($payment);

//		$result = $payment->execute(new PaymentExecution(), $paypal);


//		dd($payment->create($payment));
//		dd(Payment::get($payment_id, $paypal));


//		$payment = Payment::get($payment_id, $this->_api_context);
//		$execution = new PaymentExecution();
////		$execution->setPayerId($request->PayerID);
//
//		dd(12);
//		/** Выполняем платёж **/
//		$result = $payment->execute($execution, $this->_api_context);
//
//		if ($result->getState() == 'approved') {
//			session()->flash('success', 'Платеж прошел успешно');
//			return Redirect::route('/');
//		}
		dd(12);
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

























