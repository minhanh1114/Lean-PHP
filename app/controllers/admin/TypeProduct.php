<?php
class TypeProduct  extends Controller {
    private $data =[];
    private $ProductModel;
    public function __construct()
    {
        $this->ProductModel = $this->model('ProductModel');
    }
    private function create_slug($string)
        {
            $search = array(
                '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
                '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
                '#(ì|í|ị|ỉ|ĩ)#',
                '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
                '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
                '#(ỳ|ý|ỵ|ỷ|ỹ)#',
                '#(đ)#',
                '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
                '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
                '#(Ì|Í|Ị|Ỉ|Ĩ)#',
                '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
                '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
                '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
                '#(Đ)#',
                "/[^a-zA-Z0-9\-\_]/",
            );
            $replace = array(
                'a',
                'e',
                'i',
                'o',
                'u',
                'y',
                'd',
                'A',
                'E',
                'I',
                'O',
                'U',
                'Y',
                'D',
                '-',
            );
            $string = preg_replace($search, $replace, $string);
            $string = preg_replace('/(-)+/', '-', $string);
            $string = strtolower($string);
            return $string;
        }

    function index(){
        
        $this->data['mess'] = Session::flash('mess');
    
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
       $this->data['content']='admin/typeProduct';
       $this->render('layouts/admin_layout', $this->data);
        
    
    }
    function add(){
        $this->data['sub_content']['typesProduct']= "";
        $this->data['content']='admin/add_typeproduct';
        $this->render('layouts/admin_layout', $this->data);
    }
    function postAdd(){
        $mess ="";
        $request = new Request();
        $response = new Response();
        $dataType = $request->getDataRequest();
      
        if(filter_var($dataType['display_order'],FILTER_VALIDATE_INT)!==false && !empty( $dataType['name_type'] )&& strlen($dataType['meta_description'])<=255)
        {
            $dataType['slug_type'] = $this->create_slug($dataType['name_type']);
           if( $this->ProductModel->insert_typeproduct($dataType)){
                $mess.="Thêm loại sản phẩm thành công";
           }
           else{
            $mess.="Lỗi truy vấn cơ sở dữ liệu";
           }
           
        }
        else{
            $mess.="Lỗi Kiểu dữ liệu không khớp";
        }
        
        Session::flash('mess',$mess);
        $response->redirect('admin/typeProduct');
        
        
    }
    function edit($id){
        $response = new Response();
        if(filter_var($id,FILTER_VALIDATE_INT)!==false)
        {
            $this->data['sub_content']['totalNews'] = 6;
            $this->data['sub_content']['typeProduct'] = $this->ProductModel->getTypeProductId($id);
            $this->data['content']='admin/edit_typeproduct';
            $this->render('layouts/admin_layout', $this->data);
        }
        
        else{
            Session::flash('mess','Lỗi Dữ liệu');
            $response->redirect('admin/typeProduct');
        }
    }
       
    function postEdit(){
        $mess="";
        $request = new Request();
        $response = new Response();
        $dataType = $request->getDataRequest();
        if(filter_var($dataType['display_order'],FILTER_VALIDATE_INT)!==false && !empty( $dataType['name_type'] )&& strlen($dataType['meta_description'])<=255)
        {
            $dataType['slug_type'] = $this->create_slug($dataType['name_type']);
            $dataType['date_type'] = date('Y-m-d H:i:s');
            $condition = 'id_type = '.$dataType['id_type'];
            unset($dataType['id_type']);
           
           if( $this->ProductModel->update_typeproduct($dataType,$condition)){
                $mess.="Sửa loại sản phẩm thành công";
           }
           else{
            $mess.="Lỗi truy vấn cơ sở dữ liệu";
           }
           
        }
        else{
            $mess.="Lỗi Kiểu dữ liệu không khớp";
        }
        
        Session::flash('mess',$mess);
        echo Session::flash('mess');
        // $response->redirect('admin/typeProduct');
        

    }
    function del ($id)
    {
        $mess = "";
        $response = new Response();
        if(filter_var($id,FILTER_VALIDATE_INT)!==false)
        {
            $condition = 'id_type = '.$id;
            if($this->ProductModel->delete_typeproduct($condition))
            {
                $mess .="Đã Xóa Thành Công";
            }
            else{
                $mess .="Đã xảy ra lỗi khi xóa dữ liệu";
            }
        }
        else
        {
            $mess .="Lỗi dữ liệu";
        }
        Session::flash('mess',$mess);
        $response->redirect('admin/typeProduct');

    }
}