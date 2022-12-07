<?php
class ProductModel extends Model{
    private $_table='product';

    public function getProductList($idType ="",$limit ="")
    {
        if(!empty($idType) && !empty($limit)) 
        {
            $data = $this->database->query('SELECT * FROM '. $this->_table . '  WHERE product.type= ' . $idType .' ORDER BY view DESC limit ' . $limit)->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {

            $data = $this->database->query('SELECT * FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type')->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function getToProductType($slugType)
    {
        return $this->database->query('SELECT * FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type where types.slug_type = ' . '"' .$slugType.'"')->fetchAll(PDO::FETCH_ASSOC);
           
    }

    function getProductSlug($slug="")
    {
        return $this->database->query('SELECT * FROM '. $this->_table . '  WHERE slug = ' .'"'. $slug.'"')->fetchAll(PDO::FETCH_ASSOC);
    }
    function getProductOffer($limit)
    {
        return $this->database->query('SELECT * FROM '. $this->_table . ' ORDER BY view DESC limit ' . $limit)->fetchAll(PDO::FETCH_ASSOC);
    }

    function getTypeProduct(){
        $data = $this->database->query("SELECT * FROM types")->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
    }
    function searchProduct($searchKey)
    {
        return $this->database->query("SELECT * FROM ".$this->_table." WHERE name LIKE '%".$searchKey."%' " )->fetchAll(PDO::FETCH_ASSOC);
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

        return $this->database->deleteData($this->_table,$condition);
        
          
    }

    function editProduct($id)
    {
        
       $product = $this->database->query('select * from ' .$this->_table.' where id = '. $id )->fetchAll(PDO::FETCH_ASSOC);
       return $product;
    }
    function updateProduct($data,$condition)
    {
        if($this->database->updateData($this->_table,$data,$condition))
        {
            return true;
        }
        else{
            return false;
        }
    }
}