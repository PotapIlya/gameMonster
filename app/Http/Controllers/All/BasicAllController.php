<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicAllController extends Controller
{

	const LOCALE = ['ru', 'en'];
	const CURRENCY = ['RUB', 'USD', 'EUR'];

	public function __construct()
	{
		$this->middleware('locale');

		parent::__construct();
	}
}
