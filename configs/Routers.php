<?php
$routers['default_controller'] ='Home';
// đường đẫn ảo trỏ đường dẫn thật
$routers['san-pham'] = 'product/index';
$routers['trang-chu'] = 'home';
$routers['gioi-thieu'] = 'home/introduce';
$routers['lien-he'] = 'home/contact';
$routers['tin-tuc'] = 'news/getAllNew'; // tin tức
$routers['tin-tuc/(.*).html'] = 'news/index/$1'; // tin tức
$routers['san-pham/(.*).html'] = 'product/index/$1'; // 
$routers['loai-san-pham/(.*).html'] = 'product/typeProduct/$1'; //
$routers['admin/dashboard'] = 'admin/dashboard';
$routers['admin/product'] = 'admin/product';
$routers['admin/news'] = 'admin/news';
$routers['admin/user'] = 'admin/user';

