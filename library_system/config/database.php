<?php

declare(strict_types=1);

return [
    'default' => env('database.driver', 'mysql'),
    'connections' => [
        'mysql' => [
            'type' => 'mysql',
            'hostname' => env('database.hostname', '127.0.0.1'),
            'database' => env('database.database', 'library_system'),
            'username' => env('database.username', 'root'),
            'password' => env('database.password', 'root'),
            'hostport' => env('database.hostport', '3306'),
            'charset' => env('database.charset', 'utf8mb4'),
            'prefix' => '',
            'debug' => env('app_debug', false),
            'break_reconnect' => true,
            'fields_strict' => true,
        ],
    ],
];
