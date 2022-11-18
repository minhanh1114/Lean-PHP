<?php
class ProductModel{
    public function getProductList(){
        return[
            'sp1',
            'sp1',
            'sp1'
        ];
    }
    function getProductId($id){
        $data =['item1','item2','item3'];
        return $data[$id];
    }
}