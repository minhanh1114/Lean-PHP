<?php
class Login extends Controller{
    private $data =[];
    private $HomeModel;
    public function __construct(){
        $this->HomeModel = $this->model('Admin');
      }
    function index(){
        $this->data['title']='Đăng nhập';
        $this->render('admin/login', $this->data);
        
    }
    function login(){
        $request = new Request();
       $response = new Response();
       $data =$request->getDataRequest();
       var_dump($data);
    }
}