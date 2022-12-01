<?php
class News  extends Controller {
    private $data =[];
    private $NewsModel;
public function __construct()
{
    $this->NewsModel = $this->model('NewsModel');
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
    $request = new Request();
    $param=$request->getDataRequest();
    if(!empty($param))
        foreach($param as $key => $val)
        {
            $this->data['sub_content'][$key] = $val;
        }
    $this->data['sub_content']['title'] = 'Danh Sách Tin Tức';
    $this->data['sub_content']['news'] = $this->NewsModel->getNewsList();
    $this->data['content']='admin/news';
    $this->render('layouts/admin_layout', $this->data);
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
            $upload = move_uploaded_file($file['tmp_name'],$target_dir . '/' . $newName);
            if($upload)
            {
                $dataNews['img'] = $newName;
                $inserted =$this->NewsModel->insertNews($dataNews);
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
    
     $response->redirect('admin/news',$error);
}
function edit($id){
    $news =  $this->NewsModel->editNews($id);
    $this->data['sub_content']['news'] = $news;
    $this->data['sub_content']['title'] = 'Sửa tin tức';
    $this->data['content']='admin/edit_news';

    $this->render('layouts/admin_layout', $this->data);
}
function del($id)
{
    $response = new Response();
    $condition = 'id='.$id;
    if($this->NewsModel->delNews($condition))
    {
        $mess ="Xóa tin tức thành công";
    }
    else
    {
        $mess ="Xóa tin tức thất bại";
        
    }
    $response->redirect('admin/news',$mess);

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
                $upload = move_uploaded_file($file['tmp_name'],$target_dir . '/' . $newName);
                if($upload)
                {
                    $data['img'] = $newName;
                }
                else{
                    $error="upload ảnh thất bại";
                    $response->redirect('admin/news',$error);
                }
            }
            else
            {
                $error = 'file upload large(lớn)';
                $response->redirect('admin/news',$error);

            }

        }
        else
        {
            $error = 'Không đúng định dạng file ảnh';
            $response->redirect('admin/news',$error);

        }
    }
    else
    {
        echo 'không có ảnh' ;
    
    }

    $data['slug'] = $this->create_slug($data['title']);
                // truy vấn database
    if(!empty($data['id']))
    {
        $condition = 'id='.$data['id'];
        unset($data['id']);
        print_r($condition);
        $inserted =$this->NewsModel->updateNews($data,$condition);
        if($inserted)
        {
            $error ="Sửa sản phẩm thành công";
            $response->redirect('admin/news',$error);
        }
        else
        {
            $error ="Sửa sản phẩm thất bại, vui lòng kiểm tra lại";
            $response->redirect('admin/news',$error);

        }
    }
    else
    {
        $data['message'] ='lỗi truy vấn thiếu trường id';
        App::loadError('exception',$data);
    }


    // 
//    echo '<pre>';
//    print_r($data);
//    echo '</pre>';
}

}