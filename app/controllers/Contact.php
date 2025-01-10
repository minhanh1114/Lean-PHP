
<?php
class Contact extends Controller {
    private $ContactModel;
    private $data=[];
    // private $secretKey = getenv('SECRETCLOUD');
    private $secretKey ="0x4AAAAAAAkYbnIJR1eAtvtZg2OMIRgmQMI";

    private $ProductModel;
    function __construct()
    {
        $this->ContactModel = $this->model('ContactModel');
        $this->ProductModel = $this->model('ProductModel');

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

    public function index()
    {
        $this->data['title'] = 'Liên hệ';
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['sub_content']['state']=Session::flash('state');
       
        $this->data['content'] = 'home/contact';
        $this->render('layouts/client_layout', $this->data);
    }
    function PostContact()
    {
        $request = new Request();
        $response = new Response();
        $state = "";
        $this->data =$request->getDataRequest();

        foreach ($this->data as $key => $value) {
            if (!in_array($key, ['name', 'phone', 'content'])) {
                unset($requestData[$key]);
            }
        }
        
        

        if($this->validationCaptcha($this->data['cf-turnstile-response']))
        {
            unset($this->data['cf-turnstile-response']);
            // check trường dữ liệu
            if (
                preg_match('/^[0-9]{10}$/', $this->data['phone']) &&
                isset($this->data['name']) && strlen($this->data['name']) > 3 && strlen($this->data['name']) < 30 &&
                isset($this->data['content']) && strlen($this->data['content']) < 500) 
           
            {
                  
                    if($this->ContactModel->postContact($this->data))
                    {
                        $state = "Chúng tôi đã nhận được thông tin của bạn và sẽ phản hồi trong thời gian sớm nhất.";
                        Session::flash('state',$state);
                        $response->redirect('lien-he');
                       
                    }
                    $state="Đã xảy ra lỗi trong quá trình sử lí dữ liệu";
                    
    
            } 
            else {
                $state="Dữ liệu sai yêu cầu dữ liệu chính xác";
                    
            }
            
        }
        else{

            $state="Xác thực mã captcha không thành công";
         }


        Session::flash('state',$state);
        $response->redirect('lien-he');

        
    }

}
?>