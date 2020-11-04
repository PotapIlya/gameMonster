<?php


namespace App\Services\User;

use App\Exceptions\BalanceException;
use App\Exceptions\BuyKeyException;
use App\Models\Admin\HistoryPayments;
use Cookie;
use Auth;

final class BalanceService
{

//	const sKey = 'eyJ2ZXJzaW9uIjoiUDJQIiwiZGF0YSI6eyJwYXlpbl9tZXJjaGFudF9zaXRlX3VpZCI6ImY4czdzdS0wMCIsInVzZXJfaWQiOiI3OTYxNDQwNTM5MCIsInNlY3JldCI6ImQ5MThhYTlhYzA2ZWIxMWE2YTQyZWYzN2Q3ZDdjOWRjNGIzNDFmOWY4NThlYTI5Mjg4ZDYxM2Q5YjgyMDNhMDkifX0=';


	/**
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws BuyKeyException
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 */
	public function addBalanceByCookie()
	{


		if ( !is_null(Cookie::get('billId')) && Cookie::get('billId')
			&&
			!is_null(Cookie::get('id')) && Cookie::get('id')
			&&
			(int) Cookie::get('id') === Auth::id() )
		{
			$billPayments = new \Qiwi\Api\BillPayments(config('payment.qiwi.secret_key'));
			$status = $billPayments->getBillInfo( Cookie::get('billId') );

			// DB
			$query = HistoryPayments::where('billId', Cookie::get('billId'))->first();
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
							->withCookie(\Cookie::forget('billId'))
							->withCookie(\Cookie::forget('id'));
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

		throw new BuyKeyException();

	}


}
