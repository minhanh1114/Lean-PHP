<?php
class App{
    private $__controller,$__action,$__params,$__router;
    // hàm khởi tạo
    static public $app;
    function __construct(){
        self::$app = $this;
        $this->__router = NEW Router();
        global $routers;
        if(!empty($routers['default_controller']))
        {
            $this->__controller =$routers['default_controller'];
        }
        $this->__action ='index';
        $this->__params =[];
        $this->handleUrl();
       
    }
    // lấy requets
    function getUrl(){
        if(!empty($_SERVER['PATH_INFO']))
        {
            $url = $_SERVER['PATH_INFO'];
        }
        else{
            $url ='/';
        }
        
        return $url;
    }
    function handleUrl(){
        $url = $this->getUrl();
        
        $url =$this->__router->handleRouter($url);
        //middleWare
        // var_dump($url);
        if(!empty($this->__router->getUri()))
        {

            $this->handleRouteMiddleware($this->__router->getUri());
        }
        else
        {
            $this->handleRouteMiddleware($url);

        }
        
        $urlArr= array_filter(explode('/',$url));
        $urlArr = array_values($urlArr); // đánh lại chỉ mục
        //xử lí controllers nếu có /product sẽ gán lại nếu k bằng controllers mặc định
        $urlCheck='';
        if(!empty($urlArr))
        {
            foreach ($urlArr as $key=>$item)
            {

                $urlCheck .= $item .'/';
                $fileCheck = rtrim($urlCheck,'/');
                $fileArr = explode('/',$fileCheck);
                $fileArr[count($fileArr)-1]= ucfirst($fileArr[count($fileArr)-1]);
                $fileCheck = implode('/', $fileArr);
                if(!empty($urlArr[$key-1]))
                {
                    unset($urlArr[$key-1]);
                    
                }
                // kiểm tra đúng đến file thì break
                if(file_exists('app/controllers/'.$fileCheck.'.php')) // kiểm tra file tồn tại
                {
                    $urlCheck = $fileCheck;
                    break;
                }
                    
            }
            
            $urlArr = array_values($urlArr);
        }
        
    
        if(!empty($urlArr[0]))
        {
            $this->__controller =ucfirst($urlArr[0]); //ucfirst is uppercase first letter
            
        }
        else{
            $this->__controller =ucfirst($this->__controller);
        }
        if(empty($urlCheck))
        {
            $urlCheck = $this->__controller;
        }
        if(file_exists('app/controllers/'. $urlCheck.'.php')) // kiểm tra file tồn tại
            {
                require_once('app/controllers/'.$urlCheck.'.php');
                if(class_exists($this->__controller))//kiểm tra class tồn tại
                {
                    $this->__controller = new $this->__controller();
                    unset($urlArr[0]);// hủy biến đó đi
                }
                else{
                    $this->loadError();
                }
                
            }
            else{
               $this->loadError();
            }
        //xử lí action
        if(!empty($urlArr[1]))
        {
          $this->__action = $urlArr[1];
          unset($urlArr[1]);// hủy biến đó đi
            
        }
        //Xử lí params
        $this->__params = array_values($urlArr);
        if(method_exists($this->__controller,$this->__action))
        {
            call_user_func_array([$this->__controller, $this->__action], $this->__params); // tham số chuyển là mảng gọi đén class và fuc với params
        }
        else{
            $this->loadError();
        }
        // echo ("<pre>".print_r($this->__params)."</pre>");
    }
    public function handleRouteMiddleware($routeKey){
        global $config;
        $routeKey = trim($routeKey);
        // var_dump($routeKey);
        if (!empty($config['app']['routeMiddleware'])){
            $routeMiddleWareArr = $config['app']['routeMiddleware'];
            
            foreach ($routeMiddleWareArr as $key=>$middleWareItem){
                
                if ($routeKey==trim($key) && file_exists('app/middlewares/'.$middleWareItem.'.php')){
                    require_once 'app/middlewares/'.$middleWareItem.'.php';
                    if (class_exists($middleWareItem)){
                        $middleWareObject = new $middleWareItem();
                        
                        $middleWareObject->handle();
                    }
                }
            }
        }
        else
            echo 'k thấy config middleWare';
    }
<<<<<<< HEAD
   static function loadError($nameError='404',$data =[]){
=======
    function loadError($nameError='404',$data =[]){
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
            extract($data);
        require_once('app/errors/'.$nameError.'.php');

    }
}
?>