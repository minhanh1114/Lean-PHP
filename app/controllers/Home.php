<?php
class Home{
    public function index (){
        echo "HOME";
    }
    public function detail ($id='',$slug=''){
        echo "HOME".$id;
        echo "HOME".$slug;
    }
    public function search (){
        $keyWord = $_GET['keyword'];
        echo "Key word:".$keyWord;
        
    }
}