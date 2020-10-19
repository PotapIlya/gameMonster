<?php

namespace App\Http\Controllers\Auth\CustomTrait;

use App\Models\User;
use App\Models\UserAbout;
use App\Models\UserServices;
use Illuminate\Support\Facades\Auth;
use Cookie;

trait AuthTrait{

	private $request;

	public function __construct(\Request $request)
	{
		$this->request = $request;
	}

	protected function CreateUser($login, $img, $email)
	{
		$createUser = User::create([
			'login' => $login,
			'img' => $img,
			'email' =>$email,
		]);
		$createAboutUser = UserAbout::create([
			'user_id' => $createUser['id']
		]);

		if ($createAboutUser){
			return $createUser;
		}
	}


	protected function CreateUserServices($userId, $authenticationId, $type, $login, $img, $email)
	{
		return UserServices::create([
			'user_id' => $userId,
			'authentication_id' => $authenticationId,
			'type' => $type,
			'login' => $login,
			'img' => $img,
			'email' => $email,
		]);
	}

	protected function CheckServices($id, $type)
	{

		$check = UserServices::where('type', $type)
			->where('authentication_id', $id)
			->first();

		if ($check) {
			return $check;
		} else{
			return false;
		}
	}


	protected function AuthById($id)
	{
		Auth::loginUsingId($id, true );
	}

}