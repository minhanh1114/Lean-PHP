<?php
class Login extends Controller{
    private $data =[];
    private $Login;
<<<<<<< HEAD
    // private $secretKey = getenv('SECRETCLOUD');
    private $secretKey ="0x4AAAAAAAkYbnIJR1eAtvtZg2OMIRgmQMI";
    public function __construct(){
        $this->Login = $this->model('Admin');
      }
      function validationCaptcha($captchaResponse){
        // Gửi yêu cầu POST tới Cloudflare để xác thực CAPTCHA
        $captcha = curl_init();
        curl_setopt($captcha, CURLOPT_URL, "https://challenges.cloudflare.com/turnstile/v0/siteverify");
        curl_setopt($captcha, CURLOPT_POST, true);
        curl_setopt($captcha, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($captcha, CURLOPT_POSTFIELDS, http_build_query([
            'secret' => $this->secretKey,
            'response' => $captchaResponse,
            'remoteip' => $_SERVER['REMOTE_ADDR'] 
        ]));
        $response = curl_exec($captcha);
        curl_close($captcha);

        $result = json_decode($response, true);

        // Kiểm tra kết quả xác thực
        if ($result['success']) {
            
           return true;
        }
        return false;
    }
=======
    public function __construct(){
        $this->Login = $this->model('Admin');
      }
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
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
<<<<<<< HEAD
      
       $this->data =$request->getDataRequest();
       var_dump($this->data['cf-turnstile-response']);
       if($this->validationCaptcha($this->data['cf-turnstile-response'])||!empty($this->data['username'])||!empty($this->data['password']))
        { 
            
            
            $user = $this->Login->checkLogin($this->data['username'],$this->data['password']);
            if(!empty($user))
                {
                //thành công
                Session::data('nameAdmin',$user[0]['fullname']);
                Session::data('loginAdmin',$user[0]['uid']);
                Session::data('idAdmin',$user[0]['id']);
                Session::data('usernameAdmin',$user[0]['username']);
                $response->redirect('admin/dashboard');
                }
            else{
                $response->redirect('admin/login','Tài khoản hoặc mật khẩu không chính xác');
            }
        }
        else
        {
            

            $response->redirect('admin/login','Xác thực Captcha không thành công');

        }

    
        
=======
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
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
    }
    function logout(){
       $response = new Response();
        Session::delete('nameAdmin');
        Session::delete('loginAdmin');
        $response->redirect('admin/login');

    }
}