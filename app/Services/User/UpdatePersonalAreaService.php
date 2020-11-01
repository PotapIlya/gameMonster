<?php


namespace App\Services\User;


use App\Models\User;

final class UpdatePersonalAreaService
{


	/**
	 * @param int $userId
	 * @param $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function updateInfoUser(int $userId, $request)
	{
		User::find($userId)->update([
			'login' => $request->input('login'),
			'email' => $request->input('email'),
			'phone' => $request->input('phone'),
		]);
		return response()->json(['success' => 'success']);
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
			User::find($user->id)->update([
				'password' => bcrypt($request->input('password'))
			]);
			return response()->json(['success' => 'success']);
		}
		else
		{
			return response()->json(['errors' => 'password_old не правильный']);
		}
	}

}