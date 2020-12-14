<?php


namespace App\Services\User;

use App\Exceptions\BuyKeyException;
use App\Models\User;
use App\Models\User\UserServices;
use Auth;

final class UpdatePersonalAreaService
{

	/**
	 * @param array $array
	 * @return \Illuminate\Http\JsonResponse
	 * @throws BuyKeyException
	 */
	public function deleteServices(array $array)
	{

		if ( !is_null($array['id']) && Auth::id() === (int) UserServices::findOrFail($array['id'])['user_id'] )
		{
			if ( UserServices::destroy($array['id']) )
			{
				return response()->json(['success' => 'success']);
			} else {
				throw new BuyKeyException();
			}
		} else{
			throw new BuyKeyException();
		}
	}


	/**
	 * @param array $array
	 * @return \Illuminate\Http\JsonResponse
	 * @throws BuyKeyException
	 */
	public function updateInfoUser(array $array)
	{
		$update = User::findOrFail( Auth::id() )->update([
			'login' => $array['login'],
			'email' => $array['email'],
			'phone' => $array['phone'],
		]);
		if ($update)
		{
			return response()->json(['success' => 'success']);
		} else{
			return response()->json(['success' => '1234']);
		}
	}


	/**
	 * @param array $array
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function updatePassword(array $array)
	{
		if ( $array['oldPassword'] === $array['password'] )
		{
			return response()->json(['errors' => 'Old and new password are the same']);
		}

		if (\Hash::check($array['oldPassword'], Auth::user()->password ))
		{
			$update = User::findOrFail( Auth::id() )->update([
				'password' => bcrypt($array['password'])
			]);
			if ($update){
				return response()->json(['success' => 'success']);
			}
		}
		else
		{
			return response()->json(['errors' => 'You entered an invalid old password']);
		}
	}

}