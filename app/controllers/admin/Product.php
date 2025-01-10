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
    $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
    $this->data['sub_content']['typeSelected']='';

    if(!empty($param['k']))
    {
        $this->data['sub_content']['products']=$this->ProductModel->searchProduct($param['k']);
        $this->data['sub_content']['title'] = 'Tìm kiếm sản phẩm';
        $this->data['content']='admin/product';
        $this->render('layouts/admin_layout', $this->data);
    }
    else if(!empty($param['type']))
    {
        $this->data['sub_content']['products']=$this->ProductModel->getToProductType($param['type']);
        $this->data['sub_content']['typeSelected']=$param['type'];
        $this->data['sub_content']['title'] = 'Tìm kiếm sản phẩm';
        $this->data['content']='admin/product';
        $this->render('layouts/admin_layout', $this->data);
    }
    else
    {
        if(!empty($param["page"]))
        {
            $page =$param["page"];
        }
        else {
            
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
    
}

private function create_thumb($fileImageDrirect,$newName,$DrirectNew="public/assets/products/thumb")
{
    $fileImage = $fileImageDrirect . $newName;
    // Set a maximum height and width
$width = 250;
$height = 200;


// Get new dimensions
list($width_orig, $height_orig) = getimagesize($fileImage);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height > $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
   $height = $width/$ratio_orig;
}

// Resample
$image_p = imagecreatetruecolor($width, $height);
// $image = imagecreatefromjpeg($fileImage);
$exploded = explode('.',$fileImage);
$ext = end($exploded);

if (preg_match('/jpg|jpeg/i',$ext)){$image=imagecreatefromjpeg($fileImage);}
else if (preg_match('/png/i',$ext)){$image=imagecreatefrompng($fileImage);}
else if (preg_match('/gif/i',$ext)){$image=imagecreatefromgif($fileImage);}
else    {return false;}

imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Output
// imagejpeg($image_p, "public/assets/products/" . $newName, 100);
imagejpeg($image_p, $DrirectNew. '/' . $newName, 90);
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
    $countImage=0;
    $fileName = $file['name'];
    $fileName = explode('.',$fileName);
    $extension = end($fileName);
    $data['slug'] = $this->create_slug($data['name']);
    $newName = $data['slug'] .'-'.$data['code'].'.'. $extension;
    while (file_exists($target_dir . $newName)) {
        $countImage++;
        $newName = $data['slug'] . '-' . $data['code'] . $countImage . '.' . $extension;
    }


    if (empty(trim(strip_tags($data['des_short'])))) {
        $error = "Tóm tắt sản phẩm không được để trống .";
        Session::flash('mess', $error);
        $response->redirect('admin/product');
        return;
    }
    // mã giảm giá
    if(filter_var($data['discount_percentage'], FILTER_VALIDATE_INT))
    {
        $filtered_value = filter_var($data['discount_percentage'], FILTER_VALIDATE_INT);
        if($filtered_value<0||$filtered_value>100)
        {
            $error = "Lỗi chỉ giảm giá từ 0-100%";
            Session::flash('mess', $error);
            $response->redirect('admin/product');
            return;
        }
    }
    else{
        $error = "Lỗi dữ liệu giảm giá";
        Session::flash('mess', $error);
        $response->redirect('admin/product');
        return;

    }
    // giá sản phẩm
    if(!filter_var($data['price'], FILTER_VALIDATE_INT))
    {

        $error = "Lỗi giá sản phẩm hãy thử lại";
        Session::flash('mess', $error);
        $response->redirect('admin/product');
        return;
    }

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
                $idTemp=$data['product_images_id'];
                unset($data['product_images_id']);
                $this->create_thumb(_DIR_ROOT . '/public/assets/products/',$newName);
                // truy vấn database
                $idProduct =$this->ProductModel->insertProduct($data);
                if(!empty($idProduct))
                {
                    $dataImages['product_id']=$idProduct;
                    $dataImages['is_temp']=0;
                    $conditionUpdateImages='product_id='.$idTemp;
                   if($this->ProductModel->updateImages($dataImages,$conditionUpdateImages))
                   {
                    $error = 'Thêm sản phẩm thành công';
                   }
                   else
                   {
                    $error="Sửa dữ liệu ảnh phụ thất bại";

                   }
                   
                    
                }
                else
                {
                    $error ="Thêm sản phẩm thất bại";
                }
                
              
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
// UPLOAD HÌNH ẢNH PHỤ SẢN PHẨM 
function ajaxAddProductImages(){
    $request = new Request();
    $data=$request->getDataRequest();
    $target_dir = "public/assets/products/images/";

    $file=$_FILES['file'];
    if (!empty($file['tmp_name'])&&$data['product_id'])
    {
        $check = getimagesize($file['tmp_name']);
        if($check)
        {
            $extension=pathinfo($file['name'], PATHINFO_EXTENSION);
            $nameFile =md5(time() . $file['name']) . '.' . $extension;
            $upload = move_uploaded_file($file['tmp_name'],$target_dir . '/' . $nameFile);
            if($upload)
            {

                $this->create_thumb(_DIR_ROOT . "/public/assets/products/images/",$nameFile,$target_dir."thumb_images/");
                $data['image_path']=$nameFile;
                $data['id_images']=$this->ProductModel->insertImages($data);

                header('Content-Type: application/json');
                echo json_encode($data);
            }
        }
        else{
            $data['error']="Lỗi định dạng ảnh";
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }
    else
    {
        $data['error']="Lỗi thông tin k đủ";
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
    

}
function ajaxDeleteProductImages(){
        $request = new Request();
        $data=$request->getDataRequest();
        if(!empty($data['id']))
        {
            $condition = 'id='.$data['id'];
            $dataImages=$this->ProductModel->getImagesPath($data['id']);
    
            if($this->ProductModel->deleteImages($condition))
            {
                $old_image= _DIR_ROOT . '/public/assets/products/images/'.$dataImages[0]['image_path'];
                $old_image_thumb= _DIR_ROOT . '/public/assets/products/images/thumb_images/'.$dataImages[0]['image_path'];
                if(file_exists($old_image) && file_exists($old_image_thumb))
                {
                    unlink($old_image);
                    unlink($old_image_thumb);

                    $data['status']=true;
                    $data['name']=$dataImages[0]['image_path'];
                }
                else
                {
                    $data['status']=false;
                $data['message']='ảnh k tồn tại';


                }
               
            }
            else{
                $data['status']=false;
                $data['message']='Lỗi xóa ảnh';

                
            }
            header('Content-Type: application/json');
            echo json_encode($data);
        }
} 
function edit($id){
   
    $product =  $this->ProductModel->editProduct($id);
    $productImages=$this->ProductModel->getImages($id);
    $typeProduct =$this->ProductModel->getTypeProduct();

    $this->data['sub_content']['product'] = $product;
    $this->data['sub_content']['productImages'] = $productImages;
    $this->data['sub_content']['typeProduct'] = $typeProduct;

    $this->data['sub_content']['title'] = 'Sửa sản phẩm';
    $this->data['content']='admin/edit_product';

    Session::flash('pageHistoryProduct',$_SERVER["HTTP_REFERER"]);
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

    if (empty(trim(strip_tags($data['des_short'])))) {
        $error = "Tóm tắt sản phẩm không được đê trống.";
        Session::flash('mess', $error);
        $response->redirect('admin/product');
        return;
    }
    // mã giảm giá
    $filtered_value = filter_var($data['discount_percentage'], FILTER_VALIDATE_INT);
    if($filtered_value!==false)
    {
        
        if($filtered_value<0||$filtered_value>100)
        {
            $error = "Lỗi chỉ giảm giá từ 0-100%";
            Session::flash('mess', $error);
            $response->redirect('admin/product');
            return;
        }
    }
    else{
        $error = "Lỗi dữ liệu giảm giá";
        Session::flash('mess', $error);
        $response->redirect('admin/product');
        return;

    }
    // giá sản phẩm
    if(filter_var($data['price'], FILTER_VALIDATE_INT) === false)
    {
        $error = "Lỗi giá sản phẩm hãy thử lại";
        Session::flash('mess', $error);
        $response->redirect('admin/product');
        return;
    }
    // check file tồn tại không
    //delete file img old
    if (!empty($file['tmp_name']))
    {
        
        // RENAME   FILE IMG
        $countImage=0;
        $fileName = $file['name'];
        $fileName = explode('.',$fileName);
        $extension = end($fileName);
        $data['slug'] = $this->create_slug($data['name']);
        $newName = $data['slug'] .'-'.$data['code'].'.'. $extension;
        while (file_exists($target_dir . $newName)) {
        $countImage++;
        $newName = $data['slug'] . '-' . $data['code'] . $countImage . '.' . $extension; 
        }

        // check type image upload format
        if(in_array($extension,$type_allow))
        {
            $size = $file['size']/1024/1024; //  bytes->mb
            if($size<=$size_allow)
            {
                $upload = move_uploaded_file($file['tmp_name'],$target_dir . '/' . $newName);
                
                if($upload)
                {
                   
                    $this->create_thumb(_DIR_ROOT . '/public/assets/products/',$newName);

                    //xóa ảnh cũ
                    $product = $this->ProductModel->getProductId($data['id']);
                    $old_image= _DIR_ROOT . '/public/assets/products/'.$product['img'];
                    $old_image_thumb= _DIR_ROOT . '/public/assets/products/thumb/'.$product['img'];
                    if (file_exists($old_image))
                    {
                        unlink($old_image);
                        unlink($old_image_thumb);

                        $data['img'] = $newName;
                        $error ="upload thành công";
                        
                    }
                    else{
                        $error ="Hình ảnh không cũ không tồn tại";
            
                    }
                    // end 
                    
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

    $data['date'] = date('Y-m-d H:i:s');
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
        $pageHistoryProduct = Session::flash('pageHistoryProduct');
        $response->redirect($pageHistoryProduct);
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
        $mess='';
        $condition = 'id='.$id;
        $product = $this->ProductModel->getProductId($id);
        $old_image= _DIR_ROOT . '/public/assets/products/'.$product['img'];
        $old_image_thumb= _DIR_ROOT . '/public/assets/products/thumb/'.$product['img'];


        //  echo '<pre>';
        // print_r($product['img']);
        // echo '</pre>';
        if($this->ProductModel->delProduct($condition))
        {
            if (file_exists($old_image) && file_exists($old_image_thumb))
            {
                unlink($old_image);
                unlink($old_image_thumb);
                $ImagesPaths = $this->ProductModel->getImages($id); //lấy dữ liệu tất cả các ảnh phụ
                $conditionImages='product_id = ' .$id;
                if($this->ProductModel->deleteImages($conditionImages))
                {
                    

                    foreach($ImagesPaths as $imagePath)
                    {
                        $old_image_path= _DIR_ROOT . '/public/assets/products/images/'.$imagePath['image_path'];
                        $old_image_thumb_path= _DIR_ROOT . '/public/assets/products/images/thumb_images/'.$imagePath['image_path'];
                        if(file_exists($old_image_path) && file_exists($old_image_thumb_path))
                        {
                                unlink($old_image_path);
                                unlink($old_image_thumb_path);
                        }
                    }
                        
                     $mess ="Xóa sản phẩm thành công";
                }
                else
                {

                    $mess ="Xóa sản phẩm thất bại";
                }
                
            }
            else{
                $mess ="Hình ảnh chính không tồn tại";
    
            }

        }
        else
        {
            $mess =" Xóa sản phẩm thất bại";
            
        }
        Session::flash('mess',$mess);
        $response->redirect($_SERVER["HTTP_REFERER"]);


        
    }



}