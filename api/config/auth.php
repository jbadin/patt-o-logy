<?php
<<<<<<< HEAD
=======

>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1
return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\Models\User::class
        ]
    ]
<<<<<<< HEAD
];
=======
];
>>>>>>> ad29c5174472ac8f41f377dd8d0d5cc5d2ab34c1
