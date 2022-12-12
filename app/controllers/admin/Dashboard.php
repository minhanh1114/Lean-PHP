<?php
class Dashboard  extends Controller {
    private $data =[];
function index(){
    $this->data['sub_content']['title'] = 'Trang tổng hợp';
    $this->data['content']='admin/dashboard';
    $this->render('layouts/admin_layout', $this->data);
}
function icons(){
    $this->data['sub_content']['title'] = 'icon';

    $this->data['content']='admin/icons';
    $this->render('layouts/admin_layout', $this->data);
}
function notification(){
    $this->data['sub_content']['title'] = 'Thông báo';

    $this->data['content']='admin/notifications';
    $this->render('layouts/admin_layout', $this->data);
}

}