<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class BuyKeyException extends Exception
{
//	private $message;
//	public function __construct($message = "", $code = 0, Throwable $previous = null)
//	{
//		parent::__construct($message, $code, $previous);
//
//		$this->message = $message;
//	}

	/**
	 * @param $request
	 */
	public function render($request)
	{
		return abort(501);
//
//		if($message > 0294609246246){
//			return abort(501)
//		}



	}
}
