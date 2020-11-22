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
		if ( Auth::id() === UserServices::findOrFail($array['id'])['user_id'] && !is_null($array['id']) )
		{
//			UserServices::destroy($array['id'])
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
	 * @param int $userId
	 * @param $request
	 * @return \Illuminate\Http\JsonResponse
	 * @throws BuyKeyException
	 */
	public function updateInfoUser(int $userId, $request)
	{
		// try - catch
		$update = User::findOrFail($userId)->update([
			'login' => $request->input('login'),
			'email' => $request->input('email'),
			'phone' => $request->input('phone'),
		]);
		if ($update)
		{
			return response()->json(['success' => 'success']);
		} else{
			throw new BuyKeyException();
		}
	}


	/**
	 * @param object $user
	 * @param $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function updatePassword(object $user, $request)
	{
		if ($request->input('oldPassword') === $request->input('password'))
		{
			return response()->json(['errors' => ['oldPassword' => ['Старый и новый пароль совпадает']]]);
		}

		if (\Hash::check($request->input('oldPassword'), $user->password))
		{
			User::findOrFail($user->id)->update([
				'password' => bcrypt($request->input('password'))
			]);
			return response()->json(['success' => 'success']);
		}
		else
		{
			return response()->json(['errors' => 'Вы ввели не верный старый пароль']);
		}
	}

}