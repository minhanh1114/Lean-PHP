<?php
class Router{
    private $uri=null;
    
     function  handleRouter($url){
        global $routers;
        unset($routers['default_controller']);
        $url = trim($url,'/');
        // if(empty($url))
        // {
        //     $url ='/';
        // }
        $handleUrl = $url;
        if(!empty($routers))
        {
            foreach ($routers as $key => $value)
            {
                // echo $key . ': ' . $value;
                if(preg_match('~'.$key.'~is',$url))
                {
                   
                    $handleUrl =preg_replace('~'.$key.'~is',$value,$url);
                    $this->uri =$key;

                }
            }
        }
        return $handleUrl;
    }
    function getUri(){
        return $this->uri;
    }
}