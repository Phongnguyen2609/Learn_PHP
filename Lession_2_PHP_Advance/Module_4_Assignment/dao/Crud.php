<?php
include 'Conncet.php';

class Crud extends Connect {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData($query){
        $result = $this->conn->prepare($query);
        $result->execute();
        
        $cruds = $result->fetchAll(PDO::FETCH_ASSOC);
        if(count($cruds) > 0){
            return $cruds;
        } else {
            return false;
        }
    }

    public function addData($query){
        
        $result = $this->conn->prepare($query);
        // $result->execute();
        if($result > 0){
            return true;
        } else {
            return false;
        }
    }
}