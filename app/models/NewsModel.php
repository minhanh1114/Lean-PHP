<?php
class NewsModel extends Model{
    private $_table='news';

    // admin/news
    public function getNewsList($limit="")
    {
        if(!empty($limit))
        {
            $data = $this->database->query('SELECT * FROM '. $this->_table. ' ORDER BY view DESC LIMIT ' .$limit)->fetchAll(PDO::FETCH_ASSOC);

        }
        else
        {

            $data = $this->database->query('SELECT * FROM '. $this->_table )->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function getAllNews($page_index,$limit)
    {
        return $this->database->query('select * from ' . $this->_table . ' limit ' . $page_index . ' , ' . $limit)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCountNew()
    {
        return $this->database->query('select count(*) from ' . $this->_table)->fetchAll();
    }
    public function getNewsSlug($slug)
    {
        $data = $this->database->query('SELECT * FROM '. $this->_table.' WHERE slug = '. '"'.$slug.'"' )->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function searchNews($searchKey)
    {
        return $this->database->query('SELECT * FROM '. $this->_table.' WHERE title LIKE '. '"%'.$searchKey.'%"' )->fetchAll(PDO::FETCH_ASSOC);
        
    }
    function updateView($data,$condition){
        return $this->database->updateData($this->_table,$data,$condition);
    }
    // admin/postAddNews
    function insertNews($dataNews)
    {
       if($this->database->insertData($this->_table,$dataNews)){
        return  true;
       }
       else{
            return false;
       }
    }

    function delNews($condition){
        return $this->database->deleteData($this->_table,$condition);
          
    }

    function editNews($id)
    {
        
       $news = $this->database->query('select * from ' .$this->_table.' where id = '. $id )->fetchAll(PDO::FETCH_ASSOC);
       return $news;
    }

    function updateNews($data,$condition)
    {
        if($this->database->updateData($this->_table,$data,$condition))
        {
            return true;
        }
        else{
            return false;
        }
    }
}