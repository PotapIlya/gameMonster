<?php

namespace App\Http\Controllers\User;

use App\Exceptions\BalanceException;
use App\Exceptions\BuyKeyException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\BalanceRequest;
use App\Models\Admin\HistoryPayments;
use App\Services\User\Balance\AddBalance;
use App\Services\User\Balance\CheckBalance;
use App\Services\User\BalanceService;
use Cookie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Auth;

class BalanceController extends Controller
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


//        return view('user.addBalance.index');
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
	 * @param BalanceRequest $request
	 * @param AddBalance $addBalance
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws BuyKeyException
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 */
    public function store(BalanceRequest $request, AddBalance $addBalance)
	{

		switch ($request->input('name'))
		{
			case 'qiwi':
				return $addBalance->qiwi($request->all());
				break;

			case 'paypal':
				return $addBalance->paypal($request->all());
				break;

			case 'payeer':
				return $addBalance->payeer($request->all());
				break;

			default:
				return response()->json(['error' => 'error']);
		}
	}


	/**
	 * @param $name
	 * @param CheckBalance $checkBalance
	 * @param Request $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|int|string|void
	 * @throws BuyKeyException
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 */
	public function checkStatusBalance($name, CheckBalance $checkBalance, Request $request)
	{
		return $checkBalance->checkCookie($name, $request->all());
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
