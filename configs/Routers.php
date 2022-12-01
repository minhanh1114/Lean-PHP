<?php
$routers['default_controller'] ='Home';
// đường đẫn ảo trỏ đường dẫn thật
$routers['san-pham'] = 'product/index';
$routers['trang-chu'] = 'home';
$routers['tin-tuc/.+-(\d+).html'] = 'news/index/$1';
$routers['admin/product'] = 'admin/product';
