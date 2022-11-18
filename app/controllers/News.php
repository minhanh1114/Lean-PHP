<?php
class News extends Controller{
    function __construct(){
       
    }
    function index($id){
        echo 'tin tức - '.$id;
    }
}
//call_user_func_array([$this->__controller, $this->__action], $this->__params);
// câu lệnh thực hiện gọi function(action) với id(param) sang class(controller) chỉ định