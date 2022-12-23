<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
		
	'facebook' => [
		'client_id' => '1848167182098754',
	    'client_secret' => 'a9e348fb8057eb3af8eb2d02e6023ff9',
	    'redirect' => 'https://swappi.dk/social/auth/facebook',
	],

    'google' => [
        'client_id' => '139607884076-en5up1u1ju0a5noiskdj0e9m05td9ou3.apps.googleusercontent.com',
        'client_secret' => 'PG5nIo29jxMvS7wnGJr2lzXX',
        'redirect' => 'https://swappi.dk/social/auth/google',
    ],

];
