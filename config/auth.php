<?php

return [

    'defaults' => [
        'guard' => 'pegawai',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'pegawai' => [
            'driver' => 'session',
            'provider' => 'pegawais',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'atasan' => [
            'driver' => 'session',
            'provider' => 'atasans',
        ],
    ],

    'providers' => [

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'pegawais' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pegawai::class,
        ],

        'atasans' => [
            'driver' => 'eloquent',
            'model' => App\Models\Atasan::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'pegawais' => [
            'provider' => 'pegawais',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'atasans' => [
            'provider' => 'atasans',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];