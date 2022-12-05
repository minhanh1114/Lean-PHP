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
    
        $this->data['sub_content']['dataNews'] = $this->NewsModel->getNewsSlug($slug);
        $this->data['sub_content']['dataNewsOffer'] = $this->NewsModel->getNewsList(5);
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['content']='news/index';
        $this->render('layouts/client_layout', $this->data);
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
        $this->data['sub_content']['dataNews'] = array_reverse($this->NewsModel->getAllNews($page_index,$limit));
        $totalNews= $this->NewsModel->getCountNew();
        $totalNews = $totalNews[0][0];
        $total = ceil($totalNews / $limit);
        $this->data['sub_content']['totalPage'] = $total;
        $this->data['sub_content']['page_index'] =  $page_index;
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['sub_content']['dataNewsOffer'] = $this->NewsModel->getNewsList(4);
        $this->data['content']='news/show_all';
        $this->render('layouts/client_layout', $this->data);
    }
   
}
//call_user_func_array([$this->__controller, $this->__action], $this->__params);
// câu lệnh thực hiện gọi function(action) với id(param) sang class(controller) chỉ định