<?php
class Query{
    private $conn;
   
    function __construct()
    {
        $this->conn = Database::getInstance();
        // var_dump($this->conn);
        // $this->conn= $database->connection;
    }
    //Thêm dữ liệu
    function insertData($table, $data){

        if (!empty($data)){
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key=>$value){
                $fieldStr.=$key.',';
                $valueStr.="'".$value."',";
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";
            
            $status = $this->conn->query($sql);

            if ($status){
                return true;
            }
        }

        return false;
    }
    
    
    //Sửa dữ liệu
    function updateData($table, $data, $condition=''){

        if (!empty($data)){
            $updateStr = '';
            foreach ($data as $key=>$value){
                $updateStr.="$key='$value',";
            }

            $updateStr = rtrim($updateStr, ',');

            if (!empty($condition)){
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            }else{
                $sql = "UPDATE $table SET $updateStr";
            }

            $status = $this->conn->query($sql);

            if ($status){
                return true;
            }
        }

        return false;
    }

    //Xoá dữ liệu
    function deleteData($table, $condition=''){

        if (!empty($condition)){
            $sql = 'DELETE FROM '.$table.' WHERE '.$condition;
        }else{
            $sql = 'DELETE FROM '.$table;
        }

        $status = $this->conn->query($sql);

        if ($status){
            return true;
        }

        return false;
    }

    //Truy vấn câu lệnh SQL
    function query($sql){
       
        try{
            $statement = $this->conn->prepare($sql);

            $statement->execute();

            return $statement;
        }catch (Exception $exception){
            $mess = $exception->getMessage();
            $data['message'] = $mess;
            App::$app->loadError('database', $data);
            die();
        }

    }

    //Trả về id mới nhất sau khi đã insert
    function lastInsertId(){
        return $this->conn->lastInsertId();
    }
}