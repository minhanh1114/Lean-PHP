<?php
class News extends Controller{
    private $data =[];
    private $NewsModel;
    private $ProductModel;
        public function __construct()
        {
            $this->NewsModel = $this->model('NewsModel');
            $this->ProductModel = $this->model('ProductModel');
        }
    function index($slug){
        // chi tiết news
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['sub_content']['dataNewsOffer'] = $this->NewsModel->getNewsList(5);
        $this->data['sub_content']['dataNews'] = $this->NewsModel->getNewsSlug($slug);

    
        if(!empty($this->data['sub_content']['dataNews']))
        {
            //get data to tag meta
            $this->data['title']=$this->data['sub_content']['dataNews'][0]['title'];
            $this->data['image'] = 'news/' . $this->data['sub_content']['dataNews'][0]['img'];
            $this->data['meta_description']=$this->data['sub_content']['dataNews'][0]['meta_description'];

            // update view 
            $dataView['view'] =  $this->data['sub_content']['dataNews'][0]['view'] +1;
            $condition = 'id='.$this->data['sub_content']['dataNews'][0]['id'];
            // update view success
            if($this->NewsModel->updateView($dataView,$condition))
                {
                    $this->data['content']='news/index';
                    $this->render('layouts/client_layout', $this->data);
                }
            else{
                App::loadError('exception', $data['message'] ='Update view lỗi');
            }
        }
        else
        {
            $this->data['title'] ="Tin tức & Sự kiện";
            App::loadError('404', $this->data);
        }
        
        

       
    }
    function getAllNew(){
        // 
        // $this->data['sub_content']['dataNewsOffer'] = $this->NewsModel->getNewsList(5);
        $request = new Request();
        $page = $request->getDataRequest();
        if(!empty($page["page"]))
        {
            $page =$page["page"];
        }
        else
        {
            $page = 1;
        }
        $limit = 10;
        $page_index = ($page-1) * $limit; 
        //  lấy dữ liêu từ đâu đến đâu
<<<<<<< HEAD
        $dataNews = $this->NewsModel->getAllNews($page_index,$limit);
=======
        $dataNews = array_reverse($this->NewsModel->getAllNews($page_index,$limit));
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
        // gán lại description ngắn gọn;
            for ($i=0; $i < count($dataNews); $i++) 
            {
                if(!empty($dataNews[$i]['description']))
                {
                    $dataNews[$i]['description'] = $this->character_limiter($dataNews[$i]['description'],100);
                    
                }
            }
        $this->data['sub_content']['dataNewsAll'] = $dataNews;
        $totalNews= $this->NewsModel->getCountNew();
        $totalNews = $totalNews[0][0];
        $total = ceil($totalNews / $limit);
        $this->data['sub_content']['totalPage'] = $total;
        $this->data['sub_content']['page_index'] =  $page;
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        
        $this->data['sub_content']['dataNewsOffer'] = $this->NewsModel->getNewsList(4);
        $this->data['title']='Tin Tức & Sự kiện';
        $this->data['content']='news/show_all';
        $this->render('layouts/client_layout', $this->data);
    }
    
   
}
//call_user_func_array([$this->__controller, $this->__action], $this->__params);
// câu lệnh thực hiện gọi function(action) với id(param) sang class(controller) chỉ định