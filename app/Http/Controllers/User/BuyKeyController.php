<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Catalog;
use App\Models\User\ShoppingHistory;
use App\Models\User\UserAbout;
use App\Services\User\BuyKeyService;
use Illuminate\Http\Request;
use Auth;

class BuyKeyController extends BasicUserController
{

	/**
	 * BuyKeyController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * @param int $id
	 * @param BuyKeyService $buyKeyService
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
	public function buyKey(int $id, BuyKeyService $buyKeyService)
	{
		return $buyKeyService->BuyKey($id);
	}



}
