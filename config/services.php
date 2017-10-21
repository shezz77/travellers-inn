<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'twitter' => [
        'client_id' => 'I89MgXf2Qrzd19WDycPGVg7p7',
        'client_secret' => 'loRGpgxeguexPKeZEpJpbu2JQk5GnmgBhCQjBxD55Puviwt6Jx',
        'redirect' => 'http://111.68.104.222/travellers-Inn/public/login/twitter/callback',
    ],

    'facebook' => [
        'client_id' => '1534127429973170',
        'client_secret' => 'e46b490bdae8845f5c1269a14fc76f7e',
        'redirect' => 'http://111.68.104.222/travellers-Inn/public/login/facebook/callback',
    ],

    'google' => [
        'client_id' => '847944450384-itcjah2c5gdvn663etf3neg8jnaphmqr.apps.googleusercontent.com',
        'client_secret' => 'OMTODeYz3AIMChvK8F41yLAn',
        'redirect' => 'http://111.68.104.222/travellers-Inn/public/login/google/callback',
    ],


];
