<?php
class HomeModel extends Model {
    protected $_table = 'province';
 
    
    function getList(){
        $data = $this->database->query('SELECT * FROM '. $this->_table)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getDetail($id){
        $data =['item1','item2','item3'];
        return $data[$id];
    }
}