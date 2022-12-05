<?php
class Product extends Controller{
    public $ProductModel;
    public $data =[];
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }
    public function index ($slug=""){
        $this->data['sub_content']['title'] = 'chi tết sản phẩm';
        $this->data['page_title'] = 'Chi tiết sản phẩm';
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['sub_content']['dataProduct'] = $this->ProductModel->getProductSlug($slug); 
        $this->data['sub_content']['dataProductOffer']=$this->ProductModel->getProductOffer(5);
        $this->data['content'] = 'products/detail';
        $this->render('layouts/client_layout', $this->data);
    }
    function typeProduct($slug)
    {   
        $request = new Request();
        $dataRequest = $request->getDataRequest();
        $this->data['sub_content']['title'] = 'Loại sản ph';
        $this->data['page_title'] = 'Loại sản phẩm';
        $this->data['content'] = 'products/index';
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['sub_content']['dataProduct'] = $this->ProductModel->getToProductType($slug);
        $this->render('layouts/client_layout', $this->data);
        var_dump($dataRequest);
        echo $slug;
    }

    public function getAllProducts() {
        $listProduct =$this->ProductModel->getProductList();
        $this->data['listProduct'] =$listProduct;
        $this->render('products/index', $this->data);

    }
    public function detailProductId($id=0) {
        $productId = $this->ProductModel->getProductId($id);
        // data
        $this->data['sub_content']['product'] = $productId;
        $this->data['sub_content']['title'] = 'chi tết sản phẩm';
        $this->data['page_title'] = 'Chi tiết sản phẩm';
        // page cần render vào nội dụng layouts
        $this->data['content'] = 'products/detail';
        $this->render('layouts/client_layout', $this->data);
    }
    
}