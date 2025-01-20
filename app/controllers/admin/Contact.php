<?php
class Contact extends Controller {
    private $ContactModel;
    private $data=[];

    function __construct(){
        $this->ContactModel = $this->model('ContactModel');

    }
    function index()
    {
        $this->data['mess'] = Session::flash('mess');
        $this->data['sub_content']['dataContact']= $this->ContactModel->showAllContact();
        $this->data['sub_content']['title'] = 'Thông báo';

    $this->data['content']='admin/notifications';
    $this->render('layouts/admin_layout', $this->data);
    }
    function del($id){
        $mess ="";
        $response  = new Response();
        if(filter_var($id,FILTER_VALIDATE_INT)!==false)
        {
            $condition ='id = '.$id;
            if($this->ContactModel->delete($condition))
            {

                $mess .="Xóa thành công liên hệ";
            }
            else
            {
                $mess .="Lỗi truy vấn xóa liên hệ";

            }
        }
        else
        {
            $mess .= "Lỗi dữ liệu";
        }
        Session::flash('mess',$mess);
        $response->redirect('admin/contact');

    }
}
?>