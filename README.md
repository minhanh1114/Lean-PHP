
Khi Đưa lên server thay đổi đường đẫn trong file bootstrap.php:
<br>
```
if(!empty($_SERVER['HTTPS'])&& $_SERVER['HTTPS']=='on')
{

    $web_root = 'https://'. $_SERVER['HTTP_HOST'].'/';
}
else{
    $web_root = 'http://'. $_SERVER['HTTP_HOST'].'/';

}
$folder = explode('/',$_SERVER['SCRIPT_FILENAME']);
$folder= $folder[3]; 

 $web_root = $web_root . $folder ; // thay đổi khi upload hosting ( nhớ bỏ gạch chéo  '/' và .folder)
 ```
 <br>
Thành như sau : 
<br>
```
if(!empty($_SERVER['HTTPS'])&& $_SERVER['HTTPS']=='on')
{

    $web_root = 'https://'. $_SERVER['HTTP_HOST'];
}
else{
    $web_root = 'http://'. $_SERVER['HTTP_HOST'];

}
$folder = explode('/',$_SERVER['SCRIPT_FILENAME']);
$folder= $folder[3]; 

 $web_root = $web_root  ; // thay đổi khi upload hosting ( nhớ bỏ gạch chéo  '/' và .folder)
```
<br>
#THIẾT LẬP BIẾN MÔI TRƯỜNG TRONG FILE .htacces
```
RewriteEngine On
SetEnv DBUSER bqsvaqtahosting_quanlibanhang
SetEnv DBPASS quantrivien_admin0011
SetEnv DBNAME bqsvaqtahosting_quanlibanhang
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php/$1 [L,QSA]
```
#LẤY DỮ LIỆU TỪ BIẾN MÔI TRƯỜNG
```
<?php
class Database {
    private static $instance = null;
    private static $connection;

    private function __construct()
    {
        $con="";
        $dbhost = "localhost";
        $dbuser = getenv('DBUSER');
        $dbpassword = getenv('DBPASS');
        $database = getenv('DBNAME');
        try {
            $con = new PDO ("mysql:host=$dbhost;dbname=$database", "$dbuser", "$dbpassword", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
            self::$connection = $con;
        } catch (PDOException $e) {
            App::$app->loadError('database',['message'=> new PDOException($e->getMessage(), (int)$e->getCode())]);
            die();

        }
   
    }
 
    public static function getInstance()
    {
        if (static::$instance == null) {
           new Database();
           self::$instance = self::$connection;
        }
         
        return static::$instance;
    }
}
```
