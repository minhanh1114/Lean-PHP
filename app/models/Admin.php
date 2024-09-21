<?php
class Admin extends Model {
    protected $_table = 'admin';
    
    
    function checkLogin($username, $password){

        // To protect MySQL injection (more detail about MySQL injection)
        $username = stripslashes($username);
        $password = stripslashes($password);
        $password = md5($password);
        
        $user =$this->database->query('Select * from '.$this->_table .' where username = "' . $username . '" and password = "' . $password.'" LIMIT 1')->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
    function getCount(){
        return $this->database->query('Select count(*) from '.$this->_table)->fetchAll();
       
    }
    function getAllUser()
    {
        $user =$this->database->query('Select * from '.$this->_table)->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
    function updateUser($data,$condition)
    {
       if($this->database->updateData($this->_table,$data,$condition)){
             return true;
       }
       else
       {
        return false;
       }
    }
}