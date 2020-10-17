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

Auth::routes();

//Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');
//Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
//Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

// Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');


// Email Verification Routes...
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');






/** All */

Route::group(
	[
		'namespace' => 'App\Http\Controllers\All'
	],
	function ()
	{
		Route::resource('/', 'IndexController')->names('main');
		Route::get('/show/{id}', 'IndexController@show')->name('mainShow');
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


		/** API */

		Route::post('/my/updateInfo', 'IndexController@updateInfo');
		Route::post('/my/updatePassword', 'IndexController@updatePassword');

	}
);


