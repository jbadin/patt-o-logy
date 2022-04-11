<?php
return [
    'default' => 'mysql',

    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 3306),
            'database' => env('DB_DATABASE', 'path-o-logy'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', 'WiikiiW0nd3r'),
            'charset' => env('DB_CHARSET', 'utf8'),
            'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
            'prefix' => env('DB_PREFIX', 'a9bk4_'),
            'timezone' => env('DB_TIMEZONE', '+00:00'),
            'strict' => env('DB_STRICT_MODE', false),
        ],
    ]
];
