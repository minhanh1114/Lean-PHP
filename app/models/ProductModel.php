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
    function getProductsPagination($page_index,$limit)
    {
       

            return $this->database->query('SELECT * FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type limit ' . $page_index . ' , ' . $limit)->fetchAll(PDO::FETCH_ASSOC);
       
    }
    public function getToProductType($slugType,$orderby="")
    {
        if(!empty($orderby))
        {
            return $this->database->query('SELECT * FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type where types.slug_type = ' . '"' .$slugType.'"' .' ORDER BY ' .$orderby . ' DESC ' )->fetchAll(PDO::FETCH_ASSOC);
        }
        else 
        {

            return $this->database->query('SELECT * FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type where types.slug_type = ' . '"' .$slugType.'"')->fetchAll(PDO::FETCH_ASSOC);
        }
           
    }

    function getProductSlug($slug="")
    {
        return $this->database->query('SELECT * FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type  WHERE product.slug = ' .'"'. $slug.'"')->fetchAll(PDO::FETCH_ASSOC);
    }
    function getProductOffer($limit,$typeId="")
    {
        if(!empty($typeId))
        {

            return $this->database->query('SELECT * FROM '. $this->_table . ' WHERE type = '.$typeId .' ORDER BY view DESC limit ' . $limit)->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return $this->database->query('SELECT * FROM '. $this->_table . ' ORDER BY view DESC limit ' . $limit)->fetchAll(PDO::FETCH_ASSOC);

        }
    }

    function getTypeProduct(){
        $data = $this->database->query("SELECT * FROM types")->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
    }
    function getProductId($id)
    {
        return $this->database->query('SELECT * FROM product WHERE id =' . $id)->fetch(PDO::FETCH_ASSOC);
    }
    function searchProduct($searchKey)
    {
        return $this->database->query("SELECT * FROM ".$this->_table." INNER JOIN types ON product.type = types.id_type WHERE name LIKE '%".$searchKey."%' " )->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateView($data,$condition){
        return $this->database->updateData($this->_table,$data,$condition);
    }

    function insertProduct($data)
    {
        if($this->database->insertData($this->_table,$data)){
            return true;
        }
<<<<<<< HEAD
      
         return false;
=======
        else
        {
            return false;
        }
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
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
    function getCountProduct()
    {
        return $this->database->query('select count(*) from ' . $this->_table)->fetchAll();
    }
    function getProductOrderDate()
    {
        return $this->database->query('SELECT * FROM '. $this->_table  .' ORDER BY date DESC ' )->fetchAll(PDO::FETCH_ASSOC);

    }
    function getCountType()
    {
        return $this->database->query('select count(*) from types')->fetchAll();

    }
}