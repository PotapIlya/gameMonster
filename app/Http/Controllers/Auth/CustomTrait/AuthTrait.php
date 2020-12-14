<?php

namespace App\Http\Controllers\Auth\CustomTrait;

use App\Exceptions\BuyKeyException;
use App\Models\User;
use App\Models\User\UserServices;
use Cookie;
use Auth;


trait AuthTrait
{


	/**
	 * @param int $authenticationId
	 * @param string $type
	 * @param string $login
	 * @param string $img
	 * @param $email
	 * @return \Illuminate\Http\RedirectResponse|void
	 * @throws BuyKeyException
	 */
	public function AuthWithServices(
		int $authenticationId,
		string $type,
		string $login,
		string $img,
		$email
	)
	{
		if ( Auth::check() )
		{

			if (UserServices::where('authentication_id', $authenticationId)->first())
			{
				return abort(500, 'Данную соц сеть вы уже привязывали');
			}

			$findOrCreateUser = $this->findOrCreate(
				Auth::id(),
				$authenticationId,
				$type,
				$login,
				$img,
				$email
			);

			if ($findOrCreateUser) {
				return $this->redirect('success');
			} else {
				return $this->redirect('error');
			}
		}
		else
		{
			$findUser = UserServices::where('authentication_id',  $authenticationId)->first();
			if ($findUser)
			{
				if ($this->AuthById( $findUser->user->id ))
				{
					return $this->redirect('success');
				} else{
					return $this->redirect('error');
				}
			}
			else{
				return $this->redirect('error');
			}
		}


	}


	/**
	 * @param string $name
	 * @return \Illuminate\Http\RedirectResponse
	 */
	private function redirect(string $name)
	{
		if ($name === 'success')
		{
			return redirect()->route('user.index');
		}
		else{
			throw new BuyKeyException();
//			return redirect()->back();
		}

	}


	/**
	 * @param int $userId
	 * @param int $authenticationId
	 * @param string $type
	 * @param string $login
	 * @param string $img
	 * @param $email
	 * @return UserServices|\Illuminate\Database\Eloquent\Model
	 */
	private function findOrCreate(int $userId, int $authenticationId, string $type, string $login, string $img, $email)
	{
		return UserServices::firstOrCreate([
			'user_id' => $userId,
			'authentication_id' => $authenticationId,
			'type' => $type,
			'login' => $login,
			'img' => $img,
			'email' => $email
		]);
	}


	/**
	 * @param int $id
	 * @return \Illuminate\Contracts\Auth\Authenticatable
	 */
	private function AuthById(int $id)
	{
		return Auth::loginUsingId( $id, true );
	}

}