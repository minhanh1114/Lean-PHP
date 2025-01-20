<?php
class ContactModel extends Model{
    protected $_table = "contact";

    function postContact($data){
       return $this->database->insertData($this->_table,$data);

    }
    function showAllContact(){
        $data = $this->database->query('SELECT * FROM '. $this->_table)->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function delete($condition)
    {
        return $this->database->deleteData($this->_table,$condition);
    }
}
?>