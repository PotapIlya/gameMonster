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

/** All */

Route::group([], function ()
{
	$data = [
		'namespace' => 'App\Http\Controllers\All'
	];

	Route::group($data, function ()
	{
		Route::resource('/', 'IndexController')->names('main');
		Route::get('/{id}', 'IndexController@show')->name('mainShow');
	});


});

/** User */

Route::group([], function ()
{
	$data = [
		'namespace' => 'App\Http\Controllers\User'
	];

	Route::group($data, function ()
	{
		Route::resource('/my', 'IndexController')->names('user');
	});


});


