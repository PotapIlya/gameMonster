<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateInfoRequest;
use App\Models\User;
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
    	$user = Auth::user()->with('history.key', 'services')->first();
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

    }

	/**
	 * @param UpdateInfoRequest $request
	 * @param UpdatePersonalAreaService $update
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function updateInfo(UpdateInfoRequest $request, UpdatePersonalAreaService $update)
	{
		$userId = Auth::id();

		$validation = \Validator::make($request->all() ,[
			'login' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($userId)],
			'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
			'phone' => ['required', 'max:255'],
		]);
		if ($validation->fails())
		{
			return response()->json(['errors' => $validation->errors()]);
		}

		return $update->updateInfoUser($userId, $request);
	}


	/**
	 * @param Request $request
	 * @param UpdatePersonalAreaService $update
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function updatePassword(Request $request, UpdatePersonalAreaService $update)
	{
		$user = Auth::user();

		$validation = \Validator::make($request->all() ,[
			'oldPassword' => ['required', 'string'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
		if ($validation->fails()) {
			return response()->json(['errors' => $validation->errors()]);
		}

		return $update->updatePassword($user, $request);

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
