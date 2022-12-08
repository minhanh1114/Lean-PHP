<?php
class Product extends Controller{
    public $ProductModel;
    public $data =[];
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }
    public function index ($slug=""){
        // chi tiết sản phẩm
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['sub_content']['dataProduct'] = $this->ProductModel->getProductSlug($slug); 
        $this->data['sub_content']['dataProductOffer']=$this->ProductModel->getProductOffer(5);
        if(!empty($this->data['sub_content']['dataProduct']))
        {
                $this->data['title'] = $this->data['sub_content']['dataProduct'][0]['name'];
        }
        else{
            
            $this->data['title'] = 'Chi tết sản phẩm';
        }
        if(!empty($this->data['sub_content']['dataProduct'][0]['des_short']))
        {
            $this->data['description'] = $this->data['sub_content']['dataProduct'][0]['des_short'];
        }
        $this->data['content'] = 'products/detail';
        $this->render('layouts/client_layout', $this->data);
    }
    function typeProduct($slug)
    {   
        $request = new Request();
        $dataRequest = $request->getDataRequest();
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['sub_content']['dataProduct'] = $this->ProductModel->getToProductType($slug);
        if(!empty($this->data['sub_content']['dataProduct']))
        {
            $this->data['title'] = $this->data['sub_content']['dataProduct'][0]['name_type'];
        }
        else{
            
            $this->data['title'] = 'Loại sản phẩm';
        }
        $this->data['content'] = 'products/index';
        $this->render('layouts/client_layout', $this->data);
    }

    public function getAllProducts() {
        $listProduct =$this->ProductModel->getProductList();
        $this->data['listProduct'] =$listProduct;
        $this->render('products/index', $this->data);

    }
    

    
}