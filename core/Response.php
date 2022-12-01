<?php
class Response {
    function redirect($uri='',$mess=''){
        if(!empty($mess))
        {
            $uri=$uri . '?mess=' . $mess;
        }
        if(preg_match('~^(http|https)~is',$uri))
        {
            $url= $uri;
        }
        else{
            $url = _WEB_ROOT . '/' . $uri;
        }
        header("location: " . $url);
        exit;
    }
}