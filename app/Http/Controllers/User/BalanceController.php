<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceController extends BasicUserController
{
	const KEY = '48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iPrbVt6tpBwgfVmyWQ3enANLUNFX2muKZcxzdec4Cbd8rvfbmQ1SDALAKXBGdoby5nXQwZwmZ2o4JFBsjpK9SZZR4kJrT4Weot19PhaeQSi';

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
		$billPayments = new \Qiwi\Api\BillPayments(self::KEY);


//		$id = md5(date('m.d.Y.H:i:s'));

		$id = 'potap23';

		$params = [
			'publicKey' => self::KEY,
			'amount' => 1,
			'billId' => $id,
			'successUrl' => 'http://127.0.0.1:8000/qiwi/',
		];

		$link = $billPayments->createPaymentForm($params);

		return redirect($link);


	}


	public function potap(Request $request)
	{
		dd($request);
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
