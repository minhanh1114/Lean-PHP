<?php
$config['app'] = [
    
    'routeMiddleware' => [
        'admin/product' => AuthMiddleware::class,
        'admin/news' => AuthMiddleware::class,
        'admin/user' => AuthMiddleware::class,
        'admin/dashboard'=>AuthMiddleware::class,
        'admin/contact' => AuthMiddleware::class,
        'quantrivien' => AuthMiddleware::class

    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ],
    'boot' => [
        AppServiceProvider::class
    ]
];
?>