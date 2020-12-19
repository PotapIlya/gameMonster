<?php

namespace App\Exceptions;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{

	/**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

//	/**
//	 * @param \Illuminate\Http\Request $request
//	 * @param Exception $e
//	 * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
//	 * @throws \Throwable
//	 */
//	public function render($request, \Ex $exception) {
//		\Route::any(request()->path(), function () use ($exception, $request) {
//			return parent::render($request, $exception);
//		})->middleware('web');
//		return app()->make(Kernel::class)->handle($request);
//	}
}
