<?php

namespace App\Http\Controllers\User;

use App\Exceptions\BalanceException;
use App\Exceptions\BuyKeyException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\BalanceRequest;
use App\Models\Admin\HistoryPayments;
use App\Models\Test;
use App\Services\User\BalanceService;
use Cookie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Auth;

class BalanceController extends Controller
{


//	public function __construct()
//	{
//		parent::__construct();
//	}

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
	 * @param BalanceRequest $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws BuyKeyException
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 */
    public function store(BalanceRequest $request)
	{
		if ($request->input('name') === 'qiwi')
		{
			return $this->qiwi($request);
		}



		return redirect()->back();
	}




	/**
	 * @param $request
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws BuyKeyException
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 */
	private function qiwi($request)
	{

		try
		{
			$billPayments = new \Qiwi\Api\BillPayments(config('payment.qiwi.secret_key'));
			$billId = $billPayments->generateId();

			$response = $billPayments->createBill($billId,
				[
					'amount' => $request->input('money'),
					'currency' => 'RUB',
					'expirationDateTime' => $billPayments->getLifetimeByDay(1),
					'account' => \Auth::id(),
					'successUrl' => 'http://potap-test.fiery.host/',
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
					->withCookie('id', Auth::id());
			}


		}
		catch (ModelNotFoundException $exception)
		{
			throw new BuyKeyException();
		}

	}

	/**
	 * @param BalanceService $balanceService
	 * @throws \ErrorException
	 * @throws \Qiwi\Api\BillPaymentsException
	 * @throws BuyKeyException
	 */
	public function checkStatusBalance(BalanceService $balanceService)
	{
		$balanceService->addBalanceByCookie();
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
