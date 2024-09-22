<?php
class Dashboard  extends Controller {
    private $data =[];
    private $ProductModel;
    private $NewsModel;
    private $AdminModel;
public function __construct()
{
    $this->ProductModel = $this->model('ProductModel');
    $this->NewsModel = $this->model('NewsModel');
    $this->AdminModel = $this->model('Admin');
}
function index(){
    $this->data['sub_content']['title'] = 'Trang quản trị viên';
    $this->data['content']='admin/dashboard';
    $this->data['sub_content']['countAdmin']=$this->AdminModel->getCount()[0][0];
    $this->data['sub_content']['countType']=$this->ProductModel->getCountType()[0][0];
    // new
    $this->data['sub_content']['recentNews']=$this->NewsModel->getNewsOrderDate();
    $this->data['sub_content']['popularNews']=$this->NewsModel->getNewsList(4);
    // product
    $this->data['sub_content']['recentProduct']=$this->ProductModel->getProductOrderDate();

    $this->render('layouts/admin_layout', $this->data);
}
function icons(){
    $this->data['sub_content']['title'] = 'icon';

    $this->data['content']='admin/icons';
    $this->render('layouts/admin_layout', $this->data);
}
<<<<<<< HEAD

=======
function notification(){
    $this->data['sub_content']['title'] = 'Thông báo';

    $this->data['content']='admin/notifications';
    $this->render('layouts/admin_layout', $this->data);
}
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000

}