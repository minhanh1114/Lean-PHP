<?php
define('_DIR_ROOT',__DIR__);
//xử lí http root
if(!empty($_SERVER['HTTPS'])&& $_SERVER['HTTPS']=='on')
{

<<<<<<< HEAD
    $web_root = 'https://'. $_SERVER['HTTP_HOST'];
}
else{
    $web_root = 'http://'. $_SERVER['HTTP_HOST'];
=======
    $web_root = 'https://'. $_SERVER['HTTP_HOST'].'/';
}
else{
    $web_root = 'http://'. $_SERVER['HTTP_HOST'].'/';
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000

}
$folder = explode('/',$_SERVER['SCRIPT_FILENAME']);
$folder= $folder[3]; 

<<<<<<< HEAD
//  $web_root =  $web_root ; mở khi đưa lên hosting
$web_root =  $web_root.'/'.$folder ; // đóng khi đưa lên hosting
=======
 $web_root = $web_root . $folder ; // thay đổi khi upload hosting ( nhớ bỏ gạch chéo  '/' và .folder)
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
 define('_WEB_ROOT', $web_root);
 require_once ('./configs/App.php');
 require_once ('./configs/Session.php');
 require_once('./configs/Routers.php');
 require_once('./core/Database.php');
 require_once('./core/Query.php');



require_once('./core/Middlewares.php');



require_once('./core/Controller.php'); //load base controller
require_once('./core/Router.php'); 
require_once ('./core/Session.php'); //Load Session Class
require_once('./core/Model.php'); 
require_once('./app/App.php');
require_once('./core/Request.php'); 
require_once('./core/Response.php'); 
?>