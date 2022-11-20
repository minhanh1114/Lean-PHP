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
 require_once('./core/Database.php');
 require_once('./core/Query.php');
//  $database=new Query();
// $data = $database->query('SELECT * FROM `province`')->fetchAll(PDO::FETCH_ASSOC);
// print_r ($data);
// $database2=new Query();



//  $database->query('SELECT * FROM province');
require_once('./core/Controller.php'); //load base controller
require_once('./core/Router.php'); //load base 
require_once('./core/Router.php'); //load base 
require_once('./core/Model.php'); //load base 
require_once('./app/App.php');
require_once('./core/Request.php'); 
require_once('./core/Response.php'); 
?>