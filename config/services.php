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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

//    'google' => [
//    'client_id' => '823966265346-mmo1tudutleitjp3dfirkip0f5dscibm.apps.googleusercontent.com',
//    'client_secret' => 'pDswIyUOkXvTYSoJYngLUqwH',
//    'redirect' => 'https://uttervision.com/google-data'
//],

    'facebook' => [
        'client_id' => '560718551945491',
        'client_secret' => '5c650331f97b772ca9ba7f71e51cb9a2',
        'redirect' => 'https://uttervision.com/facebook-data'
    ],

    'google' => [
        'client_id' => '714683385385-d661mb5gjr1geknj24h436n70b60u9qr.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => '/member/login/google-callback'
    ],

];
