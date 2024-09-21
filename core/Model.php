<?php
class Model{
    protected $database;
    function __construct()
    {
     $this->database= new Query();
 
    }
    
}