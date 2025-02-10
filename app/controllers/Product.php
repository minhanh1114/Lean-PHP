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
        if(!empty($this->data['sub_content']['dataProduct']))
        {
            
                    // lấy hình ảnh
                    $idProduct = $this->data['sub_content']['dataProduct'][0]['id'];
                    $this->data['sub_content']['productImages']=$this->ProductModel->getImages($idProduct);
                    // end
                
                $this->data['sub_content']['dataProductOffer']=$this->ProductModel->getProductOffer(5,$this->data['sub_content']['dataProduct'][0]['type']);
                if(count($this->data['sub_content']['dataProductOffer'])<= 1)
                {
                    $this->data['sub_content']['dataProductOffer'] =$this->ProductModel->getProductOffer(5);  
                }
               
                // mô tả tag meta
                $this->data['title'] = $this->data['sub_content']['dataProduct'][0]['name'];
                $this->data['code'] = $this->data['sub_content']['dataProduct'][0]['code'];
                $this->data['image'] = 'products/' . $this->data['sub_content']['dataProduct'][0]['img'];
                $this->data['description'] = $this->data['sub_content']['dataProduct'][0]['des_short'];
                $this->data['meta_description'] = $this->data['sub_content']['dataProduct'][0]['meta_description'];
                $this->data['canonical'] = "https://". rtrim(htmlspecialchars($_SERVER['HTTP_HOST'])). "/san-pham/" .$this->data['sub_content']['dataProduct'][0]['slug'].".html";
                
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
        // load navbar
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['sub_content']['dataSelectOrderby'] = ['sort'=>'Thứ tự mặc định','popularity'=>'Thứ tự theo phổ biến','date'=>'Mới nhất'];
        if(!empty($dataRequest['orderby']))
        {
            $orderby =$dataRequest['orderby'];
            $this->data['sub_content']['orderby'] = $orderby;
            if($orderby == 'date')
            {
                 $this->data['sub_content']['dataProductAll'] = $this->ProductModel->getToProductType($slug,$orderby);

            }
            else if($orderby == 'popularity ')
            {
                //popularity 
                $orderby ='view';
                $this->data['sub_content']['dataProductAll'] = $this->ProductModel->getToProductType($slug,$orderby);
            }
            else{

                $this->data['sub_content']['dataProductAll'] = $this->ProductModel->getToProductType($slug);
            }

        }
        else
        {
            $this->data['sub_content']['orderby'] ='sort';
            $this->data['sub_content']['dataProductAll'] = $this->ProductModel->getToProductType($slug);
        }

        if(!empty($this->data['sub_content']['dataProductAll']))
        {
            $this->data['sub_content']['tocData'] =  $this->generateToc($this->ProductModel->getDesTypeProduct($this->data['sub_content']['dataProductAll'][0]['id_type'])['des_type']);
            $this->data['title'] = $this->data['sub_content']['dataProductAll'][0]['name_type'];
            $this->data['canonical'] = "https://". rtrim(htmlspecialchars($_SERVER['HTTP_HOST'])). "/loai-san-pham/" .$this->data['sub_content']['dataProductAll'][0]['slug_type'].".html";
             
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