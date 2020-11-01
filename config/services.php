<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */


	'google' => [
		'client_id' => env('GOOGLE_CLIENT_ID'),
		'client_secret' => env('GOOGLE_CLIENT_SECRET'),
		'redirect' => 'http://127.0.0.1:8000/login/google/callback'
	],
	'vkontakte' => [
		'client_id' => env('VKONTAKTE_CLIENT_ID'),
		'client_secret' => env('VKONTAKTE_CLIENT_SECRET'),
		'redirect' => 'http://127.0.0.1:8000/login/vk/callback'
	],

	'facebook' => [
		'client_id' => env('FACEBOOK_CLIENT_ID'),
		'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
		'redirect' => 'http://127.0.0.1:8000/login/facebook/callback'
	],



];
