<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicAllController extends Controller
{

	const LOCALE = ['ru', 'en'];
	const CURRENCY = ['ruble', 'dollar', 'euro'];

	public function __construct()
	{
		$this->middleware('locale');

		parent::__construct();
	}
}
