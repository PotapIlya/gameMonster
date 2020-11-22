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

	/**
	 * @var SteamAuth
	 */
	private $steam;


	/**
	 * AuthenticationController constructor.
	 * @param SteamAuth $steamAuth
	 */
	public function __construct(SteamAuth $steamAuth)
	{
		parent::__construct();

		$this->steam = $steamAuth;

//		$this->middleware('guest')->except('logout');
	}


	/**
	 * @param string $name
	 * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function redirectToProvider(string $name)
	{
		if ($name === 'steam')
		{
			return $this->steam->redirect();
		}
		else{
			return Socialite::driver($name)->redirect();
		}
	}

	/**
	 * @param string $name
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function handleProviderCallback(string $name)
	{
		if ($name === 'facebook')
		{
			$user = Socialite::driver('facebook')->user();

			return $this->AuthWithServices(
				$user['id'],
				'facebook',
				$user->name,
				$user->avatar,
				$user->email
			);
		}

		if ($name === 'vk')
		{
			$user = Socialite::driver('vkontakte')->user();
			return $this->AuthWithServices(
				$user['id'],
				'vk',
				$user['first_name'].'_'.$user['last_name'],
				$user['photo_200'],
				$user['email']
			);
		}
		if ($name === 'steam')
		{
			if ( $this->steam->validate() ) {

				$user = $this->steam->getUserInfo();
				return $this->AuthWithServices(
					$user['steamID64'],
					'steam',
					$user['personaname'],
					$user['avatar'],
					null
				);
			}
		}
		if ($name === 'google')
		{
			$user = Socialite::driver('google')->user();
			return $this->AuthWithServices(
				(int) $user['sub'],
				'google',
				$user['given_name'].'_'.$user['family_name'],
				$user['picture'],
				$user['email']
			);
		}

	}









}
