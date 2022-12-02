<?php
$config['app'] = [
    
    'routeMiddleware' => [
        'admin/product' => AuthMiddleware::class,
        'admin/news' => AuthMiddleware::class,
        'admin/user' => AuthMiddleware::class,
        // 'san-pham' => AuthMiddleware::class

    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ],
    'boot' => [
        AppServiceProvider::class
    ]
];
?>