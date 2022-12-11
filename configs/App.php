<?php
$config['app'] = [
    
    'routeMiddleware' => [
        'admin/product' => AuthMiddleware::class,
        'admin/news' => AuthMiddleware::class,
        'admin/user' => AuthMiddleware::class,
        'quantri' => AuthMiddleware::class

    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ],
    'boot' => [
        AppServiceProvider::class
    ]
];
?>