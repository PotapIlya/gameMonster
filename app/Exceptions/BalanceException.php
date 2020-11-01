<?php

namespace App\Exceptions;

use Exception;

class BalanceException extends Exception
{

	/**
	 * @param $request
	 */
	public function render($request)
	{

		return abort(500);
//		dd($request);

	}

}
