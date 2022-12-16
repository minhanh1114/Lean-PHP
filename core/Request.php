<?php
class Request {
    function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    function isPost()
    {
        if($this->getMethod() == 'post')
        {
            return true;

        }
        return false;
    }
    function isGet()
    {
        if($this->getMethod() == 'get')
        {
            return true;
        }
        return false;
    }
    function getDataRequest()
    {
        $dataRequest=[];
        // if($post)
        // {

        // }
        
        if($this->isGet())
        {
            if(!empty($_GET))
            {
              
                foreach ($_GET as $_key => $_val)
                {
                    if(!empty($_GET))
                    {
                        foreach ($_GET as $_key => $_val)
                        {
                            if(is_array($_val))
                            {

                                $dataRequest[$_key]= filter_input(INPUT_GET, $_key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FORCE_ARRAY);     
                            }
                            else{
                                $dataRequest[$_key]= filter_input(INPUT_GET, $_key,FILTER_SANITIZE_SPECIAL_CHARS);     
                            }

                        }
                     return $dataRequest;

                    }
                }
            }
        }
        // post request
        if($this->isPost())
        {
            if(!empty($_POST))
            {
                foreach ($_POST as $_key => $_val)
                {
                    if(is_array($_val))
                    {

                        $dataRequest[$_key]= filter_input(INPUT_POST, $_key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FORCE_ARRAY);     
                    }
                    else{
                        $dataRequest[$_key]= filter_input(INPUT_POST, $_key,FILTER_SANITIZE_SPECIAL_CHARS);     
                    }

                }
                return $dataRequest;
            }
        }
        
        
    }
}