<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{

	const DEFAULT_LOCALE = 'en';
	const DEFAULT_CURRENCY = 'USD';
	const DEFAULT_CURRENCY_ICON = '$';


	/**
	 * @param Request $request
	 * @param Closure $next
	 * @return mixed
	 */
    public function handle(Request $request, Closure $next)
    {

    	if ( is_null(session('currency')) )
		{
			session(['currency' => self::DEFAULT_CURRENCY]);
			session(['currencyIcon' => self::DEFAULT_CURRENCY_ICON]);
		}
    	if (is_null( session('locale') ))
    	{
			session(['locale' => self::DEFAULT_LOCALE]);
		}

    	App::setLocale(session('locale'));
        return $next($request);
    }
}
