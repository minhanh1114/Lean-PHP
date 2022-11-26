<?php
class Dashboard  extends Controller {
    private $data =[];
function index(){
    $this->data['sub_content']['title'] = 'chi tết sản phẩm';
    $this->data['content']='admin/dashboard';
    $this->render('layouts/admin_layout', $this->data);
}
function detail($id){
    echo 'xin chào cả nhà' . $id;
}
}