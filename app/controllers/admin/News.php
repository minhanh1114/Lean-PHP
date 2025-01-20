<?php
class News  extends Controller {
    private $data =[];
    private $NewsModel;
public function __construct()
{
    $this->NewsModel = $this->model('NewsModel');
}
private function create_thumb($fileImageDrirect,$newName)
{
    $fileImage = $fileImageDrirect . $newName;
    // Set a maximum height and width
$width = 400;
$height = 300;


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
// imagejpeg($image_p, "public/assets/products/" . $newName, 90);
imagejpeg($image_p, "public/assets/news/thumb/" . $newName, 100);
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
        $string = trim($string, '-');
        $string = strtolower($string);
        return $string;
    }
function index(){

    $this->data['mess'] = Session::flash('mess'); //thông báo
    
    $request = new Request();
    $param=$request->getDataRequest();

    if(!empty($param['k']))
    {
        $this->data['sub_content']['news']=$this->NewsModel->searchNews($param['k']);
        $this->data['content']='admin/news';
        $this->render('layouts/admin_layout', $this->data);
    }
    else
    {
        if(!empty($param["page"]))
        {
            $page =$param["page"];
        }
        else
        {
            $page = 1;
        }
        $limit = 8;
        $page_index = ($page-1) * $limit; 
        //  lấy dữ liêu từ đâu đến đâu
        $dataNews = $this->NewsModel->getAllNews($page_index,$limit);
        $this->data['sub_content']['news'] = $dataNews;
        $totalNews= $this->NewsModel->getCountNew();
        $totalNews = $totalNews[0][0];
        $total = ceil($totalNews / $limit);
        $this->data['sub_content']['totalPage'] = $total;
        $this->data['sub_content']['page_index'] =  $page;
        $this->data['sub_content']['totalNews'] =  $totalNews;
        
        $this->data['sub_content']['title'] = 'Danh Sách Tin Tức';
        $this->data['content']='admin/news';
        $this->render('layouts/admin_layout', $this->data);
    }

    
}
function detail($id){
    echo 'xin chào cả nhà' . $id;
}
function addNews (){
    $this->data['sub_content']['title'] = 'Thêm tin tức';
    $this->data['content']='admin/add_news';
    $this->render('layouts/admin_layout', $this->data);
}
function postAddNews (){
    $request = new Request();
    $response = new Response();
    $dataNews = $request->getDataRequest();
    $dataNews['slug']=$this->create_slug($dataNews['title']);

    // file upload
    $file = $_FILES['img'];
    $size_allow = 10; //dung lượng tải lên là 10 mb
    $target_dir = "public/assets/news/";
    $error = '';
    $type_allow= ['png', 'jpg', 'jpeg', 'gif'];

    // RENAME   FILE IMG
    $fileName = $file['name'];
    $fileName = explode('.',$fileName);
    $extension = end($fileName);
    $newName = md5(uniqid()) .'.'. $extension;

    // check type image upload
    if(in_array($extension,$type_allow))
    {
        $size = $file['size']/1024/1024; //  bytes->mb
        if($size<=$size_allow)
        { 
            
            $upload = move_uploaded_file($file['tmp_name'],$target_dir . $newName);
            
            if($upload)
            {
                $this->create_thumb(_DIR_ROOT . '/public/assets/news/',$newName);
                
                $dataNews['img'] = $newName;
                
                $inserted =$this->NewsModel->insertNews($dataNews);
                
                if($inserted)
                {
                   
                    $error = 'Thêm tin tức thành công';
                }
                else
                {
                    $error ="thêm thất bại";
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
     $response->redirect('admin/news');
}
function edit($id){
    $news =  $this->NewsModel->editNews($id);
    $this->data['sub_content']['news'] = $news;
    $this->data['sub_content']['title'] = 'Sửa tin tức';
    $this->data['content']='admin/edit_news';

    Session::flash('pageHistoryNews',$_SERVER["HTTP_REFERER"]);
    $this->render('layouts/admin_layout', $this->data);
}
function del($id)
{
    $response = new Response();
    $condition = 'id='.$id;
    $news = $this->NewsModel->getNewsId($id);
    $old_image= _DIR_ROOT . '/public/assets/news/thumb/'.$news['img'];
    $LageImageUploaded= _DIR_ROOT . '/public/assets/news/'.$news['img'];
    if($this->NewsModel->delNews($condition))
    {
       if (file_exists($old_image)&&file_exists($LageImageUploaded))
        {
                unlink($old_image);
                unlink($LageImageUploaded);
                $mess ="Xóa tin tức thành công"; 
        }
        else{
                $mess ="Hình ảnh không tồn tại";
        }
       
    }
    else
    {
        $mess ="Xóa tin tức thất bại";
        
    }
    Session::flash('mess',$mess);
    $response->redirect($_SERVER["HTTP_REFERER"]);

}
function postEdit()
{
    $response = new Response();
    $request = new Request();
    $data =  $request->getDataRequest();
    $file = $_FILES['img'];
    $size_allow = 10; //dung lượng tải lên là 10 mb
    $target_dir = "public/assets/news/";
    $error = '';
    $type_allow= ['png', 'jpg', 'jpeg', 'gif'];
    // 
    if (!empty($file['tmp_name']))
    {
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
                $upload = move_uploaded_file($file['tmp_name'],$target_dir  . $newName);
                if($upload)
                {
                    
                    $news = $this->NewsModel->getNewsId($data['id']);
                    $old_image= _DIR_ROOT . '/public/assets/news/thumb/'.$news['img'];
                    $LageImageUploaded= _DIR_ROOT . '/public/assets/news/'.$news['img'];
                    
                    
                    $createthumb= $this->create_thumb(_DIR_ROOT . '/public/assets/news/',$newName);
                    if (file_exists($old_image)&&file_exists($LageImageUploaded))
                    {
                            unlink($old_image);
                            unlink($LageImageUploaded);
                        
                    }
                    else{
                            $error ="Hình ảnh không tồn tại - ";
                    }
                    $data['img'] = $newName;
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
   
    $data['slug'] = $this->create_slug($data['title']);
    $data['date'] = date('Y-m-d H:i:s');

    if(!empty($data['id'])&& empty($error))
    {
        
        $condition = 'id='.$data['id'];
        unset($data['id']);
        $inserted =$this->NewsModel->updateNews($data,$condition);
        if($inserted)
        {
            $error ="Sửa tin tức thành công";
        }
        else
        {
            $error ="Sửa tin tức thất bại, vui lòng kiểm tra lại";
        }
        Session::flash('mess',$error);

        $pageHistoryNews = Session::flash('pageHistoryNews');
        $response->redirect($pageHistoryNews);
    }
    else
    {
        $data['message'] ='lỗi truy vấn thiếu trường id hoặc '.$error;
        App::loadError('exception',$data);
    }
}
function pin($id)
{
    $mess ="Dữ liệu không hợp lệ";
    $status="403";
    if(filter_var($id,FILTER_VALIDATE_INT)!==false)
    {
        // var_dump($id);
        $newsPinned = $this->NewsModel->getPinned();
        // var_dump( array_column($newsPinned,'id'));

        if(in_array($id, array_column($newsPinned,'id'),true))
        {
            $condition = "id = " . $id;
            $data['is_pinned']=0;
            if($this->NewsModel->updatePin($data,$condition)){
                $status = "200";
                $mess = "Đã Bỏ Ghim Bài Viết";
            }
            else{
                $status = "400";
                $mess = "Bỏ Ghim Bài Viết Thất Bại";
            }
        }
        else if(count($newsPinned)<4)
        {
            $condition = "id = " . $id;
            $data['is_pinned']=1;
            if($this->NewsModel->updatePin($data,$condition)){
                $status = "200";
                $mess = "Ghim thành công";
            }
            else
            {
                $status = "400";
                $mess = "Ghim dữ liệu thất bại";
            }

        }
        else{
            $mess ="Số lượng bài ghim vượt quá 4 bài";
        }
    }
    else 
    {
            $mess = "Truy cập từ chối";
    }
    header('Content-Type: application/json');
    echo json_encode(["mess"=>$mess,"status"=>$status]);
    exit();
}

}