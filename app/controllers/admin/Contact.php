<?php
class Contact extends Controller {
    private $ContactModel;
    private $data=[];

    function __construct(){
        $this->ContactModel = $this->model('ContactModel');

    }
    function index()
    {
        $this->data['sub_content']['dataContact']= $this->ContactModel->showAllContact();
        $this->data['sub_content']['title'] = 'Thông báo';

    $this->data['content']='admin/notifications';
    $this->render('layouts/admin_layout', $this->data);
    }
}
?>