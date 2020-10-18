<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAbout;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use Invisnik\LaravelSteamAuth\SteamAuth;

class AuthenticationController extends Controller
{
	private $steam;


	public function __construct(SteamAuth $steamAuth)
	{
		parent::__construct();

		$this->steam = $steamAuth;

		$this->middleware('guest')->except('logout');
	}


	public function redirectToProvider($name)
	{
		if ($name === 'steam')
		{
			return $this->steam->redirect();
		}
		else{
			return Socialite::driver($name)->redirect();
		}
	}

	public function handleProviderCallback($name)
	{
		if ($name === 'vk')
		{
			$this->AuthVK();
		}
		elseif ($name === 'google')
		{
			$this->AuthGoogle();
		}
		elseif ($name === 'facebook')
		{
			dd('authController  facebook');
		}
		elseif ($name === 'steam')
		{
			$this->AuthSteam();
		}

	}

	private function AuthSteam()
	{
		if ($this->steam->validate()) {
			$user = $this->steam->getUserInfo();
			$check =  User::where('authentication_id', $user['steamID64'])->first();


			if ($check)
			{
				if (Auth::loginUsingId( $check->id, true ))
				{
					dd('tes');
					return redirect('/my');

//				return redirect()->route('main.index');
				}
				else{
					dd('Error AuthenticationController');
				}
			}
			else
			{

				$userId = User::create([
					'authentication_id' => $user['steamID64'],
					'role_id' => 1,
					'login' => $user['personaname'],
					'img' => $user['avatar'],
					'email' => null,
					'password' => null,
				]);
				UserAbout::create([
					'user_id' => $userId['id']
				]);

				if (Auth::loginUsingId( $userId->id, true ))
				{
					return redirect()->route('main.index');
				}
				else{
					dd('Error AuthenticationController');
				}
			}
		}
	}

	private function AuthGoogle()
	{
		$user = Socialite::driver('google')->user();


		$check =  User::where('authentication_id', $user->user['sub'])->first();


		if ($check)
		{
			if (Auth::loginUsingId( $check->id, true ))
			{
				return redirect('/my');
//				return redirect()->route('main.index');
			}
			else{
				dd('Error AuthenticationController');
			}
		}
		else
		{
			$userId = User::create([
				'authentication_id' => $user->user['sub'],
				'role_id' => 1,
				'login' => $user->user['given_name'].' '.$user->user['family_name'],
				'img' => $user->user['picture'],
				'email' => $user->user['email'],
//				'email_verified_at' => $user->user['email_verified'],
				'password' => null,
			]);
			UserAbout::create([
				'user_id' => $userId['id']
			]);

			if (Auth::loginUsingId( $userId->id, true ))
			{
				return redirect()->route('main.index');
			}
			else{
				dd('Error AuthenticationController');
			}
		}
	}

	private function AuthVK()
	{
		$user = Socialite::driver('vkontakte')->user();
		$check =  User::where('authentication_id', $user->user['id'])->first();


		if ($check)
		{
			if (Auth::loginUsingId( $check->id, true ))
			{
				return redirect('/my');
//				return redirect()->route('main.index');
			}
			else{
				dd('Error AuthenticationController');
			}
		}
		else
		{
			$userId = User::create([
				'authentication_id' => $user->user['id'],
				'role_id' => 1,
				'login' => $user->user['first_name'].' '.$user->user['last_name'],
				'img' => $user->user['photo_200'],
				'email' => $user->user['email'],
//				'email_verified_at' => $user->user['email_verified'],
				'password' => null,
			]);
			UserAbout::create([
				'user_id' => $userId['id']
			]);

			if (Auth::loginUsingId( $userId->id, true ))
			{
				return redirect()->route('main.index');
			}
			else{
				dd('Error AuthenticationController');
			}
		}
	}


}
