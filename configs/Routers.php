<?php
$routers['default_controller'] ='Home';
// đường đẫn ảo trỏ đường dẫn thật
$routers['san-pham'] = 'product/index';
$routers['trang-chu'] = 'home';
$routers['gioi-thieu'] = 'home/introduce';
<<<<<<< HEAD
$routers['lien-he'] = 'contact';
=======
$routers['lien-he'] = 'home/contact';
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
$routers['tin-tuc'] = 'news/getAllNew'; // tin tức
$routers['search'] = 'home/search'; 

$routers['(.*).html'] = 'home/subRouter/$1'; // tin tức

$routers['tin-tuc/(.*).html'] = 'news/index/$1'; // tin tức
$routers['san-pham/(.*).html'] = 'product/index/$1'; // 
$routers['loai-san-pham/(.*).html'] = 'product/typeProduct/$1'; //

<<<<<<< HEAD
=======
$routers['quantri'] = 'admin/dashboard';
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
// $routers['admin/dashboard'] = 'admin/dashboard';
$routers['admin/product'] = 'admin/product';
$routers['admin/news'] = 'admin/news';
$routers['admin/user'] = 'admin/user';
<<<<<<< HEAD
$routers['admin/contact'] = 'admin/contact';
$routers['quantrivien'] = 'admin/dashboard';
=======
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000

