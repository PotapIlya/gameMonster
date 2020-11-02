<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\HistoryPayments;
use App\Services\User\BalanceService;
use Cookie;
use Illuminate\Http\Request;
use Auth;

class BalanceController extends BasicUserController
{


	public function __construct()
	{
		parent::__construct();
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {


        return view('user.addBalance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
    public function store(Request $request)
	{
		// rules
		if (!is_null($request->input('qiwi')))
		{
			return $this->qiwi($request);
		}


	}


	private function qiwi($request)
	{

		$key = 'eyJ2ZXJzaW9uIjoiUDJQIiwiZGF0YSI6eyJwYXlpbl9tZXJjaGFudF9zaXRlX3VpZCI6ImY4czdzdS0wMCIsInVzZXJfaWQiOiI3OTYxNDQwNTM5MCIsInNlY3JldCI6ImQ5MThhYTlhYzA2ZWIxMWE2YTQyZWYzN2Q3ZDdjOWRjNGIzNDFmOWY4NThlYTI5Mjg4ZDYxM2Q5YjgyMDNhMDkifX0=';

		$billPayments = new \Qiwi\Api\BillPayments($key);
		$billId = $billPayments->generateId();

//		dd($billPayments);
		$response = $billPayments->createBill($billId, [
				'amount' => $request->input('money'),
				'currency' => 'RUB',
				'expirationDateTime' => $billPayments->getLifetimeByDay(1),
				'account' => \Auth::id(),
				'successUrl' => 'http://potap-test.fiery.host/qiwi'
			]);

		$create = HistoryPayments::create([
			'user_id' => Auth::id(),
			'money' => $request->input('money'),
			'billId' => $billId,
			'type' => 'qiwi',
			'status' => false,
		]);

		if ($create)
		{
			return redirect($response['payUrl'])
				->withCookie('billId', $billId)
				->withCookie('id', \Auth::id());
		}

	}

	public function potap($test)
	{

		$create = HistoryPayments::create([
			'test' => $test,
		]);

		if ($create){
			return redirect('/');
		}

//		$balanceService->addBalanceByCoolie();
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
