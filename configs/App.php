<?php
$config['app'] = [
    
    'routeMiddleware' => [
        'admin/product' => AuthMiddleware::class,
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