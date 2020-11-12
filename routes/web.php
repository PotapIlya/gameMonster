<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes();
//

//Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
//Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
//Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');



// Password Reset Routes...
//Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');


// Email Verification Routes...
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');



//Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
//Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email');
//Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');





Route::get('/development', function ()
{
	return view('errors.development');
});



Route::post('/payeer', function (Request $request)
{
	dd( $request );
});

Route::post('/error', function (Request $request)
{
	dd( $request );
});


Route::post('/status', function (Request $request)
{
	dd( $request );
});



Route::get('/qiwi/status', 'App\Http\Controllers\User\BalanceController@checkStatusBalanceQiwi')->name('statusQiwi');


//Route::post('/payment', ['as' => 'payment', 'uses' => 'PaymentController@payWithpaypal']);
Route::get('/paypal/status', 'App\Http\Controllers\User\BalanceController@checkStatusBalancePaypal')->name('statusPayment');




//
//
//Route::get('/test', function ()
//{
//	return view('test');
//});
//Route::post('/testPost', function (\App\Http\Requests\TestRequest $testRequest)
//{
//	return 'potap';
//	dd('potap');
//
//
////	$validation = \Validator::make($request->all() ,[
////		'number' => ['max:3'],
////	]);
////	if ($validation->fails())
////	{
////		dd($validation->errors());
////	}
//
//	dd( $request->all() );
//});



Route::group(
	[
		'namespace' => 'App\Http\Controllers\Auth',
	], function ()
	{
		// Authentication Routes...
		Route::get('login', 'LoginController@showLoginForm')->name('login');
		Route::post('login', 'LoginController@login');
		Route::post('logout', 'LoginController@logout')->name('logout');


		// Registration Routes...
		Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
		Route::post('register', 'RegisterController@register');

		// Password Reset Routes...
		Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
		Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
		Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
		Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');


		// Auth of message...
		Route::get('/login/{name}', 'AuthenticationController@redirectToProvider')->name('login.services');
		Route::get('/login/{name}/callback', 'AuthenticationController@handleProviderCallback');
});

//Route::post('password/reset', 'Backpack\CRUD\app\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');




/** All */

Route::group(
	[
		'namespace' => 'App\Http\Controllers\All'
	],
	function ()
	{
		Route::resource('/', 'IndexController')->names('main');
		Route::get('/key/{name}', 'IndexController@show')->name('mainShow');
});



/** User */

Route::group(
	[
		'namespace' => 'App\Http\Controllers\User',
		'middleware' => 'auth'
	],
	function ()
	{
		Route::resource('/my', 'IndexController')->names('user');
		Route::resource('/balance', 'BalanceController')->names('user.balance');
		Route::patch('/buyKey/{id}', 'BuyKeyController@buyKey')->name('user.buyKey');



		/** API */

		Route::post('/my/updateInfo', 'IndexController@updateInfo');
		Route::post('/my/updatePassword', 'IndexController@updatePassword');

	}
);


