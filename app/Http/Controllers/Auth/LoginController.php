<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a Potap
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/my';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	parent::__construct();

        $this->middleware('guest')->except('logout');
    }


	protected function validator(array $data)
	{
		return Validator::make($data, [
			'email' => ['required', 'email', 'string', 'max:255'],
			'password' => ['required', 'string', 'min:8', 'max:255'],
		]);
	}

	public function login(Request $request)
	{
		$validation = $this->validator($request->all());
		if ($validation->fails())  {
			return response()->json(['errors' => $validation->errors()]);
		}
		if (Auth::attempt($request->only(['email', 'password']), $request->has('remember')))
		{
			return response()->json(['success' => 'success']);
		}
		else{
			return response()->json(['errors'=> ['email' => ['Неправильный логин или пароль']]]);
		}
	}

}
