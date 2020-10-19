<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Catalog;
use App\Models\User\ShoppingHistory;
use App\Models\UserAbout;
use Illuminate\Http\Request;
use Auth;

class BuyKeyController extends BasicUserController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function buyKey(Request $request)
	{
		$authUser = Auth::user();

		if ( $authUser->about->money < $request->input('price'))
		{
			dd('No money');
		}

		$newMoney = $authUser->about->money - $request->input('price');

		$user = UserAbout::where('user_id', Auth::id())->first();
		$user->update([
			'money' => $newMoney,
		]);

		$catalog = Catalog::find($request->input('catalogId'))->key->update([
			'status' => 0,
		]);


		$createHistory = ShoppingHistory::create([
			'user_id' => $authUser->id,
			'catalog_id' => $request->input('catalogId'),
		]);
		if ($createHistory){
			return redirect('/my');
		}


	}



}
