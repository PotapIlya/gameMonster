<?php

namespace App\Http\Controllers\Auth\CustomTrait;

use App\Models\User;
use App\Models\User\UserServices;
use Illuminate\Support\Facades\Auth;
use Cookie;

trait AuthTrait{


	protected function findOrCreate($userId, $authenticationId, $type, $login, $img, $email)
	{
		return UserServices::firstOrCreate([
			'user_id' => $userId,
			'authentication_id' => $authenticationId,
			'type' => $type,
			'login' => $login,
			'img' => $img,
			'email' => $email,
		]);
	}


	protected function AuthById($id)
	{
		return Auth::loginUsingId($id, true );
	}

}