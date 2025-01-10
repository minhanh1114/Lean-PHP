<?php
class Home extends Controller{
    private $HomeModel;
    private $ProductModel;
    private $NewsModel;
    public $data=[];
    public function __construct(){
      $this->HomeModel = $this->model('HomeModel');
      $this->ProductModel = $this->model('ProductModel');
      $this->NewsModel = $this->model('NewsModel');
    }
    public function index (){
        $queryString = $_SERVER['QUERY_STRING'];
        $queryString = strtolower($queryString);
        
        // Kiểm tra nếu URL có đuôi tệp không mong muốn
        if (preg_match('/\.(xml|xhtml|phtml|shtml|pdf|jsp|doc)$/i', $queryString) || preg_match('/(^|&)id=\d*/', $queryString)) {
            // Nếu URL có đuôi tệp hoặc tham số id, trả về mã lỗi 403 Forbidden
            APP::$app->loadError();
            exit();
        } 
        
       $this->data['sub_content']['typesProduct']= $this->ProductModel->getTypeProduct();

        $dataNews = $this->NewsModel->getNewsOrderDate(3);
        $dataNews[0]['description'] = $this->character_limiter($dataNews[0]['description'],350);
            $this->data['sub_content']['news']=$dataNews;
            
        //get list products
       $this->data['sub_content']['productList']['one'] = $this->ProductModel->getProductList($this->data['sub_content']['typesProduct'][0]['id_type'],8);
       $this->data['sub_content']['productList']['two'] = $this->ProductModel->getProductList($this->data['sub_content']['typesProduct'][1]['id_type'],8);
       $this->data['sub_content']['productList']['three'] = $this->ProductModel->getProductList($this->data['sub_content']['typesProduct'][2]['id_type'],8);
       $this->data['sub_content']['productList']['four'] = $this->ProductModel->getProductList($this->data['sub_content']['typesProduct'][3]['id_type'],8);
       
       $this->data['content']= 'home/index';
        // scherma 
       $this->data['homepage'] = true;

        $this->render('layouts/client_layout',$this->data);
    }
    
    public function subRouter($content)
    {
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        if($content == 'huong-dan-mua-hang')
        { 
            $this->data['title'] = 'Hướng dẫn mua hàng';
            $this->data['content'] = 'home/policy';
            $this->render('layouts/client_layout', $this->data);
        }
        else if ($content == 'huong-dan-thi-cong'){
            $this->data['title'] = 'Hướng dẫn thi công';
            $this->data['content'] = 'home/construction';
            $this->render('layouts/client_layout', $this->data);
        }
        else if ($content == 'chinh-sach-va-quy-dinh-chung'){
            $this->data['title'] = 'Chính sách và quy định chung';
            $this->data['content'] = 'home/generalRules';
            $this->render('layouts/client_layout', $this->data);
        }
        else
        {
            App::$app->loadError();
        }
        
    }
    public function introduce()
    {
        $this->data['title'] = 'Giới thiệu';
        $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
        $this->data['content'] = 'home/introduce';
        $this->render('layouts/client_layout', $this->data);
    }
    
    public function search (){
        $request = new Request();
        $response = new Response();
        $keyWord = $request->getDataRequest();
        if (!empty($keyWord["k"]))
        {
            // xử lí search
            $this->data['title'] = 'Tìm kiếm sản phẩm';
            $this->data['sub_content']['typesProduct'] = $this->ProductModel->getTypeProduct();
            $this->data['sub_content']['dataProductSearch'] = $this->ProductModel->searchProduct($keyWord["k"]);
            $this->data['sub_content']['keySearch'] = $keyWord["k"];
            $this->data['content'] = 'home/search';
            $this->render('layouts/client_layout', $this->data);
        }
        else
        {
            // redirect home page
            $response->redirect('');
        }
        
    }
    public function searchAjax()
    {
        $referer = $_SERVER['HTTP_REFERER'];
        if (strpos($referer, 'tonnhualaysang.vn') === false) {
            http_response_code(403);
            echo json_encode(['error' => 'Forbidden']);
            exit;
        }
        $request = new Request();
        $datas =$request->getDataRequest();
        $query = $datas['k'];
        $dataProducts = $this->ProductModel->searchProduct($query,$searchAjax=true);
        header('Content-Type: application/json');
        echo json_encode($dataProducts);
    }
    public function get_category(){
       $request = new Request();
        $data= $request->getDataRequest();
     $this->render('categorys/add');
       
    }
    public function post_category(){
       $request = new Request();
       $data=$request->getDataRequest();
    //    var_dump($data); truy vấn csdl
       $response = new Response();
       $response->redirect('home/get_category');
    //    $response->redirect('https://google.com/'); link ngoài web site

       

    }
     public function SiteMap(){
    
        $domainWeb ="https://$_SERVER[HTTP_HOST]";
        $dataProduct =  $this->ProductModel->getSiteProduct();
        $dataNews =   $this->NewsModel->getSiteNews();
        $typeProducts=  $this->ProductModel->getTypeProduct();

        header("Content-Type: application/xml; charset=utf-8");
        echo "<?xml version='1.0' encoding='UTF-8'?>\n";
        echo "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>\n";

        // Trang chủ
        echo "  <url>\n";
        echo "    <loc>{$domainWeb}/</loc>\n";
        echo "    <lastmod>2023-01-06T13:23:02+00:00</lastmod>\n";
        echo "    <priority>1.00</priority>\n";
        echo "  </url>\n";

        // Trang giới thiệu
        echo "  <url>\n";
        echo "    <loc>{$domainWeb}/gioi-thieu</loc>\n";
        echo "    <lastmod>2023-01-06T13:23:02+00:00</lastmod>\n";
        echo "    <priority>0.80</priority>\n";
        echo "  </url>\n";

        // Các loại sản phẩm
      

        foreach ($typeProducts as $typeProduct) {
            echo "  <url>\n";
            echo "    <loc>{$domainWeb}/loai-san-pham/{$typeProduct['slug_type']}.html</loc>\n";
            echo "    <lastmod>2023-01-06T13:23:02+00:00</lastmod>\n";
            echo "    <priority>0.80</priority>\n";
            echo "  </url>\n";
        }

        // Trang tin tức
        echo "  <url>\n";
        echo "    <loc>{$domainWeb}/tin-tuc</loc>\n";
        echo "    <lastmod>2023-01-06T13:23:02+00:00</lastmod>\n";
        echo "    <priority>0.80</priority>\n";
        echo "  </url>\n";

        // Trang liên hệ
        echo "  <url>\n";
        echo "    <loc>{$domainWeb}/lien-he</loc>\n";
        echo "    <lastmod>2023-01-06T13:23:02+00:00</lastmod>\n";
        echo "    <priority>0.80</priority>\n";
        echo "  </url>\n";
        
        echo "<url>\n";
        echo "    <loc>{$domainWeb}/chinh-sach-va-quy-dinh-chung.html</loc>\n";
        echo "    <lastmod>2023-01-06T13:23:02+00:00</lastmod>\n";
        echo "    <priority>0.80</priority>\n";
        echo "</url>\n";
        
        echo "<url>\n";
        echo "    <loc>{$domainWeb}/huong-dan-thi-cong.html</loc>\n";
        echo "    <lastmod>2023-01-06T13:23:02+00:00</lastmod>\n";
        echo "    <priority>0.80</priority>\n";
        echo "</url>\n";
        
        echo "<url>\n";
        echo "    <loc>{$domainWeb}/huong-dan-mua-hang.html</loc>\n";
        echo "    <lastmod>2023-01-06T13:23:02+00:00</lastmod>\n";
        echo "    <priority>0.80</priority>\n";
        echo "</url>\n";
  

    
        foreach ($dataProduct as $product) {
            echo "  <url>\n";
            echo "    <loc>$domainWeb/san-pham/{$product['slug']}.html</loc>\n";
            if (!empty($product['date'])) {
                echo "    <lastmod>".date('c', strtotime($product['date']))."</lastmod>\n";
            }
            echo"<priority>0.80</priority>";
            echo "  </url>\n";
        }
        foreach ($dataNews as $news) {
            echo "  <url>\n";
            echo "    <loc>$domainWeb/tin-tuc/{$news['slug']}.html</loc>\n";
            if (!empty($news['date'])) {
                echo "    <lastmod>".date('c',strtotime($news['date']))."</lastmod>\n";
            }
            echo"<priority>0.70</priority>";

            echo "  </url>\n";
        }
        
    
        echo "</urlset>";
    }
}