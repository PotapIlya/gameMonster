<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\CustomTrait\AuthTrait;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAbout;
use App\Models\UserServices;
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
			$cookie = Cookie::get('userId');

			$check = User::find((int)$cookie);

			if ($check) {
				$checkServices = UserServices::where('authentication_id', $user['steamID64'])->first();
				if ($checkServices) {
					$this->AuthById($checkServices->user_id);
				} else {
					$create = UserServices::create([
						'user_id' => $check->id,
						'authentication_id' => $user['steamID64'],
						'type' => 'steam',
						'login' => $user['personaname'],
						'img' => $user['avatar'],
						'email' => null,
					]);
					$this->AuthById($create->user_id);
				}
			} else {
				$create = User::create([
					'login' => $user['personaname'],
					'img' => $user['avatar'],
					'email' => null,
				]);
				UserAbout::create([
					'user_id' => $create['id']
				]);

				Cookie::forever('userId', $create['id']);


				if ($create) {
					$createServices = UserServices::create([
						'user_id' => $check->id,
						'authentication_id' => $user['steamID64'],
						'type' => 'steam',
						'login' => $user['personaname'],
						'img' => $user['avatar'],
						'email' => null,
					]);
					$this->AuthById($createServices->user_id);
				}
			}
		}
	}

	private function AuthGoogle()
	{
		$user = Socialite::driver('google')->user();
		$cookie = Cookie::get('userId');

		$services = $this->CheckServices($user->user['sub'], 'google');
		if ($services) {

			$this->AuthById($services->user_id);
			return;
		}



		$check = User::find((int) $cookie);

		if ($check)
		{
			$checkServices = UserServices::where('authentication_id', $user->user['sub'])->first();
			if ($checkServices)
			{
				$this->AuthById($checkServices->user_id);
			}
			else
			{
				$create = UserServices::create([
					'user_id' => $check->id,
					'authentication_id' => $user->user['sub'],
					'type' => 'google',
					'login' => $user->user['given_name'].' '.$user->user['family_name'],
					'img' => $user->user['picture'],
					'email' => $user->user['email'],
				]);
				$this->AuthById($create->user_id);
			}
		}
		else
		{
			$create = User::create([
				'login' => $user->user['given_name'].' '.$user->user['family_name'],
				'img' => $user->user['picture'],
				'email' => $user->user['email'],
			]);
			Cookie::forever('userId', $create['id']);
			UserAbout::create([
				'user_id' => $create['id']
			]);

			if ($create)
			{
				$createServices = UserServices::create([
					'user_id' => $create->id,
					'authentication_id' => $user->user['sub'],
					'type' => 'google',
					'login' => $user->user['given_name'].' '.$user->user['family_name'],
					'img' => $user->user['picture'],
					'email' => $user->user['email'],
				]);
				$this->AuthById($createServices->user_id);
			}
		}
	}

	private function AuthVK()
	{
		$user = Socialite::driver('vkontakte')->user();

//		dd($user);

		$cookie = Cookie::get('userId');


		// запрос в user_service на случаей если пользователь есть в базе, а нету cookie
		$services = $this->CheckServices($user->user['id'], 'vk');
		if ($services) {
			$this->AuthById($services->user_id);
			return;
		}
//
//		// ищем пользователя по cookie в users
//		$check = User::find((int) $cookie);
//		if ($check)
//		{
//			// есть в users
//			$checkServices = UserServices::where('authentication_id', $user->user['id'])->first();
//			if ($checkServices)
//			{
//				$this->AuthById($checkServices->user_id);
//			}
//			else
//			{
//				// Нету в services
//				$create = $this->CreateUserServices(
//					$check->id,
//					$user->user['id'],
//					'vk',
//					$user->user['first_name'].' '.$user->user['last_name'],
//					$user->user['photo_200'],
//					$user->user['email']
//				);
//				if ($create) {
//					$this->AuthById($create->user_id);
//				}
//			}
//		}
//		else
//		{
//			$createUser = $this->CreateUser(
//				$user->user['first_name'].' '.$user->user['last_name'],
//					$user->user['photo_200'],
//					$user->user['email'],
//			);
//			if ($createUser)
//			{
//				$createServices = $this->CreateUserServices(
//					$createUser->id,
//					$user->user['id'],
//					'vk',
//					$user->user['first_name'].' '.$user->user['last_name'],
//					$user->user['photo_200'],
//					$user->user['email'],
//				);
//				if ($createServices) {
//					$this->AuthById($createServices->user_id);
//
////					dd($createUser);
//					Cookie::queue('userId', $createUser->id, 60);
//					dd(true);
//				}
//
//			}
//		}
	}


}
