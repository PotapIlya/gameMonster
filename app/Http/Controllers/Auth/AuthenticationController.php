<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\CustomTrait\AuthTrait;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\UserServices;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use Invisnik\LaravelSteamAuth\SteamAuth;
use Cookie;

class AuthenticationController extends Controller
{
	use AuthTrait;

	private $steam;


	public function __construct(SteamAuth $steamAuth)
	{
		parent::__construct();

		$this->steam = $steamAuth;

//		$this->middleware('guest')->except('logout');
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


			if (Auth::check())
			{
				$findOrCreateUser = $this->findOrCreate(
					Auth::id(),
					$user['steamID64'],
					'steam',
					$user['personaname'],
					$user['picture'],
					null,
				);

				if ($findOrCreateUser)
				{
					return redirect()->back()->with(['success' => self::SAVE]);
				}
				else {
					return redirect()->back()->withErrors(['errors' => self::ERRORS]);
				}
			}
			else{
				$findUser = UserServices::where('authentication_id',  $user['sub'])->first();
				if ($findUser)
				{
					$auth = $this->AuthById($findUser->user->id);
					if ($auth){

						return redirect('/my');
					} else{
						return redirect()->back()->withErrors(['errors' => self::ERRORS]);
					}
				}
				else{
					return redirect()->back()->withErrors(['errors' => self::ERRORS_REGISTER]);
				}
			}

		}
	}

	private function AuthGoogle()
	{
		$user = Socialite::driver('google')->user();

		if (Auth::check())
		{
			$findOrCreateUser = $this->findOrCreate(
				Auth::id(),
				$user['sub'],
				'google',
				$user['given_name'].'_'.$user['family_name'],
				$user['picture'],
				$user['email'],
			);

			if ($findOrCreateUser)
			{
				return redirect()->back()->with(['success' => self::SAVE]);
			}
			else {
				return redirect()->back()->withErrors(['errors' => self::ERRORS]);
			}
		}
		else{
			$findUser = UserServices::where('authentication_id',  $user['sub'])->first();
			if ($findUser)
			{
				$auth = $this->AuthById($findUser->user->id);
				if ($auth){

					return redirect('/my');
				} else{
					return redirect()->back()->withErrors(['errors' => self::ERRORS]);
				}
			}
			else{
				return redirect()->back()->withErrors(['errors' => self::ERRORS_REGISTER]);
			}
		}

	}

	private function AuthVK()
	{
		$user = Socialite::driver('vkontakte')->user();

		if (Auth::check())
		{
			$findOrCreateUser = $this->findOrCreate(
				Auth::id(),
				$user['id'],
				'vk',
				$user['first_name'].'_'.$user['last_name'],
				$user['photo_200'],
				$user['email'],
			);

			if ($findOrCreateUser)
			{
				return redirect()->back()->with(['success' => self::SAVE]);
			}
			else {
				return redirect()->back()->withErrors(['errors' => self::ERRORS]);
			}
		}
		else{
			$findUser = UserServices::where('authentication_id',  $user['id'])->first();
			if ($findUser)
			{
				$auth = $this->AuthById($findUser->user->id);
				if ($auth){

					return redirect('/my');
				} else{
					return redirect()->back()->withErrors(['errors' => self::ERRORS]);
				}
			}
			else{
				return redirect()->back()->withErrors(['errors' => self::ERRORS_REGISTER]);
			}
		}

	}


}
