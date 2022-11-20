<?php
class Product extends Controller{
    public $ProductModel;
    public $data =[];
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }
    public function index (){
        echo "Product";
    }
    public function getAllProducts() {
        $listProduct =$this->ProductModel->getProductList();
        $this->data['listProduct'] =$listProduct;
        $this->render('products/index', $this->data);

    }
    public function detailProductId($id=0) {
        $productId = $this->ProductModel->getProductId($id);
        // var_dump($productId);
        $this->data['sub_content']['product'] = $productId;
        $this->data['sub_content']['title'] = 'chi tết sản phẩm';
        $this->data['page_title'] = 'Chi tiết sản phẩm';
        $this->data['content'] = 'products/detail';
        $this->render('layouts/client_layout', $this->data);
    }
    
}