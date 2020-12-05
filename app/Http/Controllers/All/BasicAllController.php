<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasicAllController extends Controller
{
	public function __construct()
	{
		$this->middleware('locale');

		parent::__construct();
	}
}
