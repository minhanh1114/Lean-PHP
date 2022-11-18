<?php
class HomeModel {
    protected $_table = 'products';
    function getList(){
        $data =['item1','item2','item3'];
        return $data;
    }
    function getDetail($id){
        $data =['item1','item2','item3'];
        return $data[$id];
    }
}