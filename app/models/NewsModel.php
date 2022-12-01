<?php
class NewsModel extends Model{
    private $_table='news';

    // admin/news
    public function getNewsList()
    {
        $data = $this->database->query('SELECT * FROM '. $this->_table )->fetchAll(PDO::FETCH_ASSOC);
        return $data;
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
        $this->database->deleteData($this->_table,$condition);
          
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