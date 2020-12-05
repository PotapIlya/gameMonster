<?php

namespace App\Http\Controllers\User;

use App\Exceptions\BuyKeyException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateInfoRequest;
use App\Http\Requests\User\UpdateUserPasswordRequest;
use App\Models\User;
use App\Models\User\UserServices;
use App\Services\User\UpdatePersonalAreaService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class IndexController extends BasicUserController
{

	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
	 */
    public function index()
    {
		$user = User::with('history.key', 'services')->find(Auth::id());
		if (!$user){
			return abort('500');
		}

		return view('user.my.index', compact('user'));
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
    public function store(Request $request)
    {
        //
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
	 * @param UpdateInfoRequest $request
	 * @param UpdatePersonalAreaService $update
	 * @return \Illuminate\Http\JsonResponse
	 * @throws BuyKeyException
	 */
    public function updateInfo(UpdateInfoRequest $request, UpdatePersonalAreaService $update)
	{
		return $update->updateInfoUser($request->all());
	}


	/**
	 * @param UpdateUserPasswordRequest $request
	 * @param UpdatePersonalAreaService $update
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function updatePassword(UpdateUserPasswordRequest $request, UpdatePersonalAreaService $update)
	{
		return $update->updatePassword( $request->all() );
	}


	/**
	 * @param Request $request
	 * @param UpdatePersonalAreaService $update
	 * @return \Illuminate\Http\JsonResponse
	 * @throws BuyKeyException
	 */
	public function deleteServices(Request $request, UpdatePersonalAreaService $update)
	{
		return $update->deleteServices( $request->all() );
	}

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
