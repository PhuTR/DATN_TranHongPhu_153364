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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    
    'google' => [

        'client_id' => '776211465426-afdhvb5e8dfp3e9jfam49egruhv6i2oc.apps.googleusercontent.com',

        'client_secret' => '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',

        'redirect' => env('APP_URL').'auth/google/callback',

    ],

    'facebook' => [

        'client_id' => '1048267846494649',

        'client_secret' => '0e94629ba3d3534893eebeaaa5aaf066',

        'redirect' => env('APP_URL').'/auth/facebook/callback',

    ],

];
