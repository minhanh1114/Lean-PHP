<?php
class App{
    private $__controller,$__action,$__params;
    // hàm khởi tạo
    function __construct(){
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
        $urlArr= array_filter(explode('/',$url));
        $urlArr = array_values($urlArr); // đánh lại chỉ mục
        //xử lí controllers
        if(!empty($urlArr[0]))
        {
            $this->__controller =ucfirst($urlArr[0]); //ucfirst is uppercase first letter
            
        }
        else{
            $this->__controller =ucfirst($this->__controller);
        }
        if(file_exists('app/controllers/'. $this->__controller.'.php')) // kiểm tra file tồn tại
            {
                require_once('app/controllers/'. $this->__controller.'.php');
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
    function loadError($nameError='404'){
        require_once('app/errors/'.$nameError.'.php');

    }
}
?>