<?php
class User extends Controller{
    private $data =[];
    private $User;
    public function __construct(){
        $this->User = $this->model('Admin');
      }
    function index ()
    {
        $request = new Request();
        $param=$request->getDataRequest();
        if(!empty($param))
            foreach($param as $key => $val)
            {
                $this->data[$key] = $val;
            }
        $this->data['sub_content']['title'] = 'Danh Sách tài khoản quản trị';
        $this->data['sub_content']['users'] = $this->User->getAllUser();
        $this->data['content']='admin/user';
<<<<<<< HEAD
        $checkMess = Session::flash('mess');
        if(!empty($checkMess))
        {
            $this->data['mess'] = $checkMess;
        }
=======
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
        $this->render('layouts/admin_layout', $this->data);
    }
    private function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 15; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    function changePass()
    {
<<<<<<< HEAD
        
=======
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
        $this->render('admin/changepass', $this->data);
    }
    function postChangePass()
    {
        $response = new Response();
        $request = new Request();
        $dataResquest =   $request->getDataRequest();
        if($dataResquest['configpassword']!= $dataResquest['passwordnew'] )
        {
            Session::flash('mess','Đổi mật khẩu thất bại');
            $response->redirect('admin/user/changePass');
        }
        else
        {
            Session::flash('mess','Vui lòng liên hệ với người phát triển để thay đổi mật khẩu');
            $response->redirect('admin/user/changePass');
        }
        
    }
<<<<<<< HEAD

    function senEmail($newPassword){
        $to = "tuan28dk10cntt@gmail.com";  
        $subject = "Thông báo thay đổi mật khẩu";    
        $message = "Bạn vừa thay đổi mật khẩu đăng nhập quản trị viên website tonnhualaysang.vn   MẬT KHẨU MỚI :".$newPassword;  
        $headers = "From: bqsvaqtahosting@hosttonnhualaysang.vn"; 
        if (mail($to, $subject, $message, $headers)) {
           return true;
        } 
        return false;
    }

=======
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
    function resetPass($id)
    {

        $resetData =[];
        $response = new Response();
        if(!empty($id))
        {
            $condition = 'id='.$id;
            $newPassword = $this->randomPassword();
            $newPasswordHash = md5($newPassword);
            $resetData['password'] = $newPasswordHash;
<<<<<<< HEAD
            if($this->senEmail($newPassword))
            {

                $this->User->updateUser($resetData,$condition);
                Session::flash('mess',"MẬT KHẨU MỚI LÀ:".$newPassword);
            }
            else
            {
                Session::flash('mess',"Gửi email thất bại xin vui lòng thử lại");
            }
            $response->redirect('admin/user');
            
            

            
=======
            $this->User->updateUser($resetData,$condition);
            Session::flash('mess','Mật khẩu mới:'.$newPassword);
            $response->redirect('admin/user');
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
        }
        else
        {
            $data['message'] ='lỗi truy vấn thiếu trường id';
            App::loadError('exception',$data);
        }
            
    }

}