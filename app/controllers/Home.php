<?php
class Home extends Controller{
    private $HomeModel;
    public $data=[];
    public function __construct(){
      $this->HomeModel = $this->model('HomeModel');
    }
    public function index (){
        $data['sub_content']['productList'] = $this->HomeModel->getList();
        $data['content']= 'home/index';
        $this->render('layouts/client_layout',$data);
    }
    public function detail ($id='',$slug=''){
        echo "HOME".$id;
        echo "HOME".$slug;
    }
    public function search (){
        $keyWord = $_GET['keyword'];
        echo "Key word:".$keyWord;
        
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