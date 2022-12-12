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
                // mô tả tag meta
                $this->data['title'] = $this->data['sub_content']['dataProduct'][0]['name'];
                $this->data['image'] = 'products/' . $this->data['sub_content']['dataProduct'][0]['img'];
                if(!empty($this->data['sub_content']['dataProduct'][0]['des_short']))
                {
                    $this->data['description'] = $this->character_limiter($this->data['sub_content']['dataProduct'][0]['des_short'],170,false) ;
                }
                // update view 
                $dataView['view'] =  $this->data['sub_content']['dataProduct'][0]['view'] +1;
                $condition = 'id='.$this->data['sub_content']['dataProduct'][0]['id'];
                if($this->ProductModel->updateView($dataView,$condition))
                {
                    $this->data['content'] = 'products/detail';
                    $this->render('layouts/client_layout', $this->data);
                }
                else{
                    App::loadError('exception', $data['message'] ='Update view lỗi');
                }
                
                }
        else{
            
            App::loadError('404', $this->data);
        }
        
        
    }
    function typeProduct($slug)
    {   
        $request = new Request();
        $dataRequest = $request->getDataRequest();
        if(!empty($dataRequest['orderby']))
        {
            $orderby =$dataRequest['orderby'];
            if($orderby == 'date')
            {
                 $this->data['sub_content']['dataProduct'] = $this->ProductModel->getToProductType($slug,$orderby);

            }
            else
            {
                //popularity 
                $orderby ='view';
                $this->data['sub_content']['dataProduct'] = $this->ProductModel->getToProductType($slug,$orderby);
            }

        }
        else{

            $this->data['sub_content']['dataProduct'] = $this->ProductModel->getToProductType($slug);
        }

        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
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