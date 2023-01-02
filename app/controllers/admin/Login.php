<?php
class Login extends Controller{
    private $data =[];
    private $Login;
    public function __construct(){
        $this->Login = $this->model('Admin');
      }
    function index(){
       $response = new Response();

       
        $request = new Request();
        $dataRequest = $request->getDataRequest();
        if( Session::data('nameAdmin')&&Session::data('loginAdmin'))
        {
            $response->redirect('admin/Dashboard');
        }
        if(!empty($dataRequest['mess']))
        {
            $this->data['mess']=$dataRequest['mess'];
        }
        $this->data['title']='Đăng nhập';
        $this->render('admin/login', $this->data);
        
    }
    function checkLogin(){
        $request = new Request();
       $response = new Response();
       $data =$request->getDataRequest();
       $user = $this->Login->checkLogin($data['username'],$data['password']);
       print_r($user[0]['uid']);
        if(!empty($user))
        {
            //thành công
            Session::data('nameAdmin',$user[0]['fullname']);
            Session::data('loginAdmin',$user[0]['uid']);
            Session::data('idAdmin',$user[0]['id']);
            Session::data('usernameAdmin',$user[0]['username']);
            $response->redirect('admin/Dashboard');
        }
        else{
            $response->redirect('admin/login','Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    function logout(){
       $response = new Response();
        Session::delete('nameAdmin');
        Session::delete('loginAdmin');
        $response->redirect('admin/login');

    }
}