<?php
class ProductModel extends Model{
    private $_table='product';

    public function getProductList()
    {
        $data = $this->database->query('SELECT * FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type')->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getProductId($id){
       
    }
    function getTypeProduct(){
        $data = $this->database->query("SELECT * FROM types")->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
    }
    function insertProduct($data)
    {
        if($this->database->insertData($this->_table,$data)){
            return true;
        }
        else
        {
            return false;
        }
    }
    function delProduct($condition){
        $this->database->deleteData($this->_table,$condition);
          
    }
}