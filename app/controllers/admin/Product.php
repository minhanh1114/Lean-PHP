<?php
class Product  extends Controller {
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
    $request = new Request();
    $param=$request->getDataRequest();
    if(!empty($param['k']))
    {
        $this->data['sub_content']['products']=$this->ProductModel->searchProduct($param['k']);
        $this->data['sub_content']['title'] = 'Tìm kiếm sản phẩm';
        $this->data['content']='admin/product';
        $this->render('layouts/admin_layout', $this->data);
    }
        if(!empty($param["page"]))
        {
                $page =$param["page"];
        }
        else
        {
                $page = 1;
        }
        // phân trnag
        $limit = 8;
        $page_index = ($page-1) * $limit; 
        //  lấy dữ liêu từ đâu đến đâu    
        $this->data['sub_content']['products'] = array_reverse($this->ProductModel->getProductsPagination($page_index,$limit));
        $totalProduct= $this->ProductModel->getCountProduct();
        $totalProduct = $totalProduct[0][0];
        $total = ceil($totalProduct / $limit);
        $this->data['sub_content']['totalPage'] = $total;// sổng số trang
        $this->data['sub_content']['page_index'] =  $page;//page hiện tại
        $this->data['sub_content']['totalProduct'] =  $totalProduct; //tổng số sản phẩm
        // phân trang
        $this->data['sub_content']['title'] = 'Quản lí sản phẩm';
        $this->data['content']='admin/product';
        $this->render('layouts/admin_layout', $this->data);
}
function addProduct(){
  

    $this->data['sub_content']['typeProduct'] = $this->ProductModel->getTypeProduct();
    $this->data['sub_content']['title'] = 'Thêm sản phẩm';
    $this->data['content']='admin/add_product';
    $this->render('layouts/admin_layout', $this->data);
}
function postAddProduct(){
    $request = new Request();
    $response = new Response();
    $data=$request->getDataRequest();
    // upload file image

    $file = $_FILES['img'];
    $size_allow = 10; //dung lượng tải lên là 10 mb
    $target_dir = "public/assets/products/";
    $error = '';
    $type_allow= ['png', 'jpg', 'jpeg', 'gif'];

    // RENAME   FILE IMG
    $fileName = $file['name'];
    $fileName = explode('.',$fileName);
    $extension = end($fileName);
    $newName = md5(uniqid()) .'.'. $extension;


    // if($data['des_short'])

    // check type image upload
    
    if(in_array($extension,$type_allow))
    {
        $size = $file['size']/1024/1024; //  bytes->mb
        if($size<=$size_allow)
        {
            $upload = move_uploaded_file($file['tmp_name'],$target_dir . '/' . $newName);
            if($upload)
            {
                $data['img'] = $newName;
                $data['slug'] = $this->create_slug($data['name']);
                // truy vấn database
                $inserted =$this->ProductModel->insertProduct($data);
                if($inserted)
                {
                   
                    $erro = 'thêm thành công';
                    
                }
                else
                {
                    $erro ="thêm thất bại";
                }
                
                $error="upload thành công";
            }
            else{
                $error="upload thất bại";

            }
        }

        else
        {
            $error = 'file upload large(lớn)';
        }

    }
    else
    {
        $error = 'Không đúng định dạng file ảnh';



    }
    Session::flash('mess',$error);
    $response->redirect('admin/product');
    


    // echo '<pre>';
    //  print_r($data);
    // echo '</pre>';
   

}
function edit($id){
   
    $product =  $this->ProductModel->editProduct($id);
    $typeProduct =$this->ProductModel->getTypeProduct();

    $this->data['sub_content']['product'] = $product;
    $this->data['sub_content']['typeProduct'] = $typeProduct;

    $this->data['sub_content']['title'] = 'Sửa sản phẩm';
    $this->data['content']='admin/edit_product';

    $this->render('layouts/admin_layout', $this->data);
}
function postEdit(){
    $request = new Request();
    $response = new Response();
    $data = $request->getDataRequest();
    $file = $_FILES['img'];
    $size_allow = 10; //dung lượng tải lên là 10 mb
    $target_dir = "public/assets/products/";
    $error = '';
    $type_allow= ['png', 'jpg', 'jpeg', 'gif'];
    // var_dump($file);
    // check file tồn tại không
    //delete file img old
    if (!empty($file['tmp_name']))
    {
        // echo 'có ảnh' .  $file['tmp_name'];
   
    

        // RENAME   FILE IMG
        $fileName = $file['name'];
        $fileName = explode('.',$fileName);
        $extension = end($fileName);
        $newName = md5(uniqid()) .'.'. $extension;

        // check type image upload format
        if(in_array($extension,$type_allow))
        {
            $size = $file['size']/1024/1024; //  bytes->mb
            if($size<=$size_allow)
            {
                $upload = move_uploaded_file($file['tmp_name'],$target_dir . '/' . $newName);
                if($upload)
                {
                    $data['img'] = $newName;
                    $error="upload thành công";
                }
                else{
                    $error="upload ảnh thất bại";
                      
                }
            }
            else
            {
                $error = 'file upload large(lớn)';
              
            }

        }
        else
        {
            $error = 'Không đúng định dạng file ảnh';

        }

    }

    $data['slug'] = $this->create_slug($data['name']);
                // truy vấn database
    if(!empty($data['id']))
    {
        $condition = 'id='.$data['id'];
        unset($data['id']);
         
        $inserted =$this->ProductModel->updateProduct($data,$condition);
        if($inserted)
        {
            $error ="Sửa sản phẩm thành công";
        
        }
        else
        {
            $error ="Sửa sản phẩm thất bại, vui lòng kiểm tra lại";
            
        }
        // session
        Session::flash('mess',$error);
        $response->redirect('admin/product');
    }

    else
    {
        $data['message'] ='lỗi truy vấn thiếu trường id';
        App::loadError('exception',$data);
    }
   

    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';
    // print_r($condition);
}

    function del($id){
        $response = new Response();
        $condition = 'id='.$id;
        if($this->ProductModel->delProduct($condition))
        {
            $mess ="Xóa sản phẩm thành công";
        }
        else
        {
            $mess ="Xóa sản phẩm thất bại";
            
        }
        Session::flash('mess',$mess);
        $response->redirect('admin/product');

        
    }



}