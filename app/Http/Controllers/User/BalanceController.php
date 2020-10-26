<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceController extends BasicUserController
{

	const ID = 'potap228';
	const LOGIN = 'admin';
	const PASSWORD = 'LWz99Ko9jG';

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    const KEY = '832b8cf0eae7c70e650313c030e2bb0e';

    public function store(Request $request)
    {
		$billPayments = new \Qiwi\Api\BillPayments(self::KEY);

		$publicKey = self::KEY;

		$params = [
			'publicKey' => $publicKey,
			'amount' => 200,
			'billId' => 'cc961e8d-d4d6-4f02-b737-2297e51fb48e',
			'successUrl' => 'http://127.0.0.1:8000/qiwi',
		];

		$link = $billPayments->createPaymentForm($params);

		return redirect($link);



	}


	public function potap()
	{
		dd(123);
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
