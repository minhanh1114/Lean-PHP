<?php
define('_DIR_ROOT',__DIR__);
//xử lí http root
if(!empty($_SERVER['HTTPS'])&& $_SERVER['HTTPS']=='on')
{

    $web_root = 'https://'. $_SERVER['HTTP_HOST'].'/';
}
else{
    $web_root = 'http://'. $_SERVER['HTTP_HOST'].'/';

}
$folder = explode('/',$_SERVER['SCRIPT_FILENAME']);
$folder= $folder[3]; 

 $web_root = $web_root . $folder; // thay đổi khi đẩy lên server;
 define('_WEB_ROOT', $web_root);
require_once('./configs/Routers.php');
require_once('./core/Controller.php'); //load base controller
require_once('./core/Router.php'); //load base 
require_once('./app/App.php');
?>