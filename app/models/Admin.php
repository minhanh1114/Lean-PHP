<?php
class Admin extends Model {
    protected $_table = 'admin';
 
    
    function login(){
        
    }
    function getDetail($id){
        $data =['item1','item2','item3'];
        return $data[$id];
    }
}