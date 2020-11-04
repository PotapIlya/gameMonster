<?php

namespace App\Exceptions;

use Exception;

class BuyKeyException extends Exception
{

	/**
	 * @param $request
	 */
	public function render($request)
	{
		return abort(503);
//		dd($request);
	}
}
