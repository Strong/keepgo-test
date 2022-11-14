<?php
return [
    'provider' => env('SMS_PROVIDER'),
    'apiKey' => env('SMS_API_KEY'),
    'auth' => [
        'login' => env('SMS_PROVIDER_LOGIN'),
        'password' => env('SMS_PROVIDER_PASSWORD'),
    ],
];
