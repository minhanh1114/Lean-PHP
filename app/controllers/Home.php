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
        $data['typesProduct']= $this->ProductModel->getTypeProduct();
        $data['news'] = $this->NewsModel->getNewsList(3);
        //get list products
        $data['productList']['one'] = $this->ProductModel->getProductList($data['typesProduct'][0]['id_type'],8);
        $data['productList']['two'] = $this->ProductModel->getProductList($data['typesProduct'][1]['id_type'],8);
        $data['productList']['three'] = $this->ProductModel->getProductList($data['typesProduct'][2]['id_type'],8);
        $data['productList']['four'] = $this->ProductModel->getProductList($data['typesProduct'][3]['id_type'],8);

        $this->render('home/index',$data);
    }
    public function contact()
    {
        $this->data['page_title'] = 'Liên hệ';
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['content'] = 'home/contact';
        $this->render('layouts/client_layout', $this->data);
    }
    public function introduce()
    {
        $this->data['page_title'] = 'Giới thiệu';
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['content'] = 'home/introduce';
        $this->render('layouts/client_layout', $this->data);
    }
    public function detail ($id='',$slug=''){
        echo "HOME".$id;
        echo "HOME".$slug;
    }
    public function search (){
        $request = new Request();
        $response = new Response();
        $keyWord = $request->getDataRequest();
        echo "Key word:".var_dump($keyWord);
        
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