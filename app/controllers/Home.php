<?php
class Home extends Controller{
    private $HomeModel;
    private $ProductModel;
    private $NewsModel;
    public $data=[];
    public function __construct(){
      $this->HomeModel = $this->model('HomeModel');
      $this->ProductModel = $this->model('ProductModel');
      $this->NewsModel = $this->model('NewsModel');
    }
    public function index (){
<<<<<<< HEAD
        
       $this->data['sub_content']['typesProduct']= $this->ProductModel->getTypeProduct();

=======
        $data['typesProduct']= $this->ProductModel->getTypeProduct();
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
        $dataNews = $this->NewsModel->getNewsOrderDate(3);
        for ($i=0; $i < count($dataNews); $i++) 
            {
                if(!empty($dataNews[$i]['description']))
                {
                    $dataNews[$i]['description'] = $this->character_limiter($dataNews[$i]['description'],200);
                    
                }
            }
<<<<<<< HEAD
            $this->data['sub_content']['news']=$dataNews;
            
        //get list products
       $this->data['sub_content']['productList']['one'] = $this->ProductModel->getProductList($this->data['sub_content']['typesProduct'][0]['id_type'],8);
       $this->data['sub_content']['productList']['two'] = $this->ProductModel->getProductList($this->data['sub_content']['typesProduct'][1]['id_type'],8);
       $this->data['sub_content']['productList']['three'] = $this->ProductModel->getProductList($this->data['sub_content']['typesProduct'][2]['id_type'],8);
       $this->data['sub_content']['productList']['four'] = $this->ProductModel->getProductList($this->data['sub_content']['typesProduct'][3]['id_type'],8);
       
       $this->data['content']= 'home/index';
        // scherma 
       $this->data['homepage'] = true;

        $this->render('layouts/client_layout',$this->data);
    }
    
=======
            $data['news']=$dataNews;
        //get list products
        $data['productList']['one'] = $this->ProductModel->getProductList($data['typesProduct'][0]['id_type'],8);
        $data['productList']['two'] = $this->ProductModel->getProductList($data['typesProduct'][1]['id_type'],8);
        $data['productList']['three'] = $this->ProductModel->getProductList($data['typesProduct'][2]['id_type'],8);
        $data['productList']['four'] = $this->ProductModel->getProductList($data['typesProduct'][3]['id_type'],8);

        $this->render('home/index',$data);
    }
    public function contact()
    {
        $this->data['title'] = 'Liên hệ';
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['content'] = 'home/contact';
        $this->render('layouts/client_layout', $this->data);
    }
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
    public function subRouter($content)
    {
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        if($content == 'huong-dan-mua-hang')
        { 
            $this->data['title'] = 'Hướng dẫn mua hàng';
            $this->data['content'] = 'home/policy';
            $this->render('layouts/client_layout', $this->data);
        }
        else if ($content == 'huong-dan-thi-cong'){
            $this->data['title'] = 'Hướng dẫn thi công';
            $this->data['content'] = 'home/construction';
            $this->render('layouts/client_layout', $this->data);
        }
        else if ($content == 'chinh-sach-va-quy-dinh-chung'){
            $this->data['title'] = 'Chính sách và quy định chung';
            $this->data['content'] = 'home/generalRules';
            $this->render('layouts/client_layout', $this->data);
        }
        
    }
    public function introduce()
    {
        $this->data['title'] = 'Giới thiệu';
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['content'] = 'home/introduce';
        $this->render('layouts/client_layout', $this->data);
    }
    
    public function search (){
        $request = new Request();
        $response = new Response();
        $keyWord = $request->getDataRequest();
        if (!empty($keyWord["k"]))
        {
            // xử lí search
            $this->data['title'] = 'Tìm kiếm sản phẩm';
            $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
            $this->data['sub_content']['dataProductSearch'] = $this->ProductModel->searchProduct($keyWord["k"]);
            $this->data['sub_content']['keySearch'] = $keyWord["k"];
            $this->data['content'] = 'home/search';
            $this->render('layouts/client_layout', $this->data);
        }
        else
        {
            // redirect home page
            $response->redirect('');
        }
        
    }
    public function get_category(){
       $request = new Request();
        $data= $request->getDataRequest();
     $this->render('categorys/add');
       
    }
    public function post_category(){
       $request = new Request();
       $data=$request->getDataRequest();
    //    var_dump($data); truy vấn csdl
       $response = new Response();
       $response->redirect('home/get_category');
    //    $response->redirect('https://google.com/'); link ngoài web site

       

    }
}