<?php
class Router{
    function __construct(){
       
    }
     function  handleRouter($url){
        global $routers;
        unset($routers['default_controller']);
        $url = trim($url,'/');
        $handleUrl = $url;
        if(!empty($routers))
        {
            foreach ($routers as $key => $value)
            {
                // echo $key . ': ' . $value;
                if(preg_match('~'.$key.'~is',$url))
                {
                   
                    $handleUrl =preg_replace('~'.$key.'~is',$value,$url);

                }
            }
        }
        return $handleUrl;
    }
}