<?php
$config['app'] = [
    
    'routeMiddleware' => [
        'admin/product' => AuthMiddleware::class,
        'admin/news' => AuthMiddleware::class,
        'admin/user' => AuthMiddleware::class,
<<<<<<< HEAD
        'admin/dashboard'=>AuthMiddleware::class,
        'admin/contact' => AuthMiddleware::class,
        'quantrivien' => AuthMiddleware::class
=======
        'quantri' => AuthMiddleware::class
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000

    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ],
    'boot' => [
        AppServiceProvider::class
    ]
];
?>