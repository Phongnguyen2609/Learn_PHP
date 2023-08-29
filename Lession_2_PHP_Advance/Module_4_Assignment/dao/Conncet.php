<?php

class Connect {
    //  private $servername = "mysql:host=localhost;dbname=assignment";
     private $servername = "mysql:host=localhost;port=4306;dbname=assignment";
     private $username = "root";
     private $password = "";
     public $conn;
 
     public function __construct()
     {
         try{
             $this->conn = new PDO($this->servername, $this->username, $this->password);
             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
             echo $e->getMessage();
         }
     }
}
