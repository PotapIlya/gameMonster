<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IndexController extends BasicUserController
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
//    	dd('auth');
        return view('user.my.index');
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
		$userId = \Auth::id();

    	if ($userId === (int) $id)
		{
			if ($request['_method'] === 'PATCH') // other
			{
				$validation = \Validator::make($request->all() ,[
					'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
					'phone' => ['required', 'max:255'],
					'name' => ['required', 'string', 'max:255', 'unique:users'],

				]);
				if ($validation->fails())
				{
					dd($validation->errors());
				}

				User::find($id)->update([
					'name' => $request->input('name'),
					'email' => $request->input('email'),
//					'phone' => $request->input('phone'),
				]);
				dd(true);


			}
			if ($request['_method'] === 'PUT') //password
			{

				$validation = \Validator::make($request->all() ,[
					'password' => ['required', 'string', 'min:8', 'confirmed'],
				]);
				if ($validation->fails()) {
					dd($validation->errors());
				}

				if (\Hash::check($request->old_password, \Auth::user()->password))
				{
					User::find($id)->update([
						'password' => bcrypt($request->password)
					]);
					dd(true);
				}
				else{
					dd( 'password_old не правильный' );
				}

			}



		}
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
