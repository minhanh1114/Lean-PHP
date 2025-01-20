<?php
class ProductModel extends Model{
    private $_table='product';
    private $_table_Images='product_images';
    private $_table_TypeProduct = 'types';


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
            return $this->database->query('SELECT  product.*,types.id_type,types.slug_type,types.name_type FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type where types.slug_type = ' . '"' .$slugType.'"' .' ORDER BY ' .$orderby . ' DESC ' )->fetchAll(PDO::FETCH_ASSOC);
        }
        else 
        {

            return $this->database->query('SELECT  product.*,types.id_type,types.slug_type,types.name_type FROM '. $this->_table . ' INNER JOIN types ON product.type = types.id_type where types.slug_type = ' . '"' .$slugType.'"')->fetchAll(PDO::FETCH_ASSOC);
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
        $data = $this->database->query("SELECT id_type,name_type,slug_type,display_order,date_type FROM types")->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
    }
    function getProductId($id)
    {
        return $this->database->query('SELECT * FROM product WHERE id =' . $id)->fetch(PDO::FETCH_ASSOC);
    }
    function searchProduct($searchKey,$searchAjax=false)
    {
        if($searchAjax)
        {
            return $this->database->query("SELECT id,code,name,slug,img  FROM ".$this->_table." INNER JOIN types ON product.type = types.id_type WHERE name LIKE '%".$searchKey."%' " )->fetchAll(PDO::FETCH_ASSOC);
        }
        return $this->database->query("SELECT * FROM ".$this->_table." INNER JOIN types ON product.type = types.id_type WHERE name LIKE '%".$searchKey."%' " )->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateView($data,$condition){
        return $this->database->updateData($this->_table,$data,$condition);
    }

   function insertProduct($data)
    {
        if($this->database->insertData($this->_table,$data)){
            return  $this->database->lastInsertId();
        }
      
            return false;
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
     public function getSiteProduct(){
        return $this->database->query('select slug,date from ' . $this->_table )->fetchAll(PDO::FETCH_ASSOC);
    }
    
     // product Images
    public function getImages($product_id){
        return $this->database->query('select id,image_path from ' . $this->_table_Images .' where product_id = '. $product_id )->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getImagesPath($id){
        return $this->database->query('select image_path from ' . $this->_table_Images .' where id = '. $id )->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertImages($data)
    {
       if($this->database->insertData($this->_table_Images,$data))
       {
           return  $this->database->lastInsertId();
       }
    }
    public function updateImages($data,$condition){
       return $this->database->updateData($this->_table_Images,$data,$condition);
    }
    public function deleteImages($condition)
    {
        return $this->database->deleteData($this->_table_Images,$condition);
    }
    // TYPE PRODUCT
    public function getTypeProductId($id)
    {
        return $this->database->query('select * from ' . $this->_table_TypeProduct . ' where id_type = '. $id)->fetch(PDO::FETCH_ASSOC);
    }
    public function insert_typeproduct($data){
       return $this->database->insertData($this->_table_TypeProduct,$data);
    }
    public function update_typeproduct($data,$condition){
        return $this->database->updateData($this->_table_TypeProduct,$data,$condition);

    }
    public function delete_typeproduct($condition){
        return $this->database->deleteData($this->_table_TypeProduct,$condition);
    }
    public function getDesTypeProduct($id){
        return $this->database->query('select des_type from ' . $this->_table_TypeProduct . ' where id_type = '. $id)->fetch(PDO::FETCH_ASSOC);

    }
}