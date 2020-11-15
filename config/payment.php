<?php

return [



	'qiwi' => [
		'secret_key' => env('QIWI_SECRET_KEY'),
		'success_url' => 'http://potap-test.fiery.host/',
	],

	'paypal' => [
		'client_id' => env('PAYPAL_CLIENT_ID',''),
		'secret' => env('PAYPAL_SECRET',''),
		'settings' => [
			'mode' => env('PAYPAL_MODE','sandbox'),
			'http.ConnectionTimeOut' => 30,
			'log.LogEnabled' => true,
			'log.FileName' => storage_path() . '/logs/paypal.log',
			'log.LogLevel' => 'ERROR'
		]
	],

	'payeer' => [
		'secret_key' => env('PAYEER_KEY')
	]



];