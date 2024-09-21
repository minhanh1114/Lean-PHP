<?php
class Database {
    private static $instance = null;
    private static $connection;

    private function __construct()
    {
        $con="";
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $database = "quanlibanhang";
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