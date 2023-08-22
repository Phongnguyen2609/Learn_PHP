<?php
require '../model/Connect.php';
// require '../controller/Create.php';
class Crud extends Connect{
    public function __construct(){
        parent::__construct();
    }

    public function getAllData() {
        $query = "SELECT id, username, email, phone, age FROM users";
        $result = $this->conn->prepare($query);
        $result->execute();
        $check = $result->fetchAll(PDO::FETCH_ASSOC);
        if(count($check) > 0){
            return $check;
        } else {
            return "Not record";
        }
    }
    public function insert(User $user)
    {
        try {
            // $check = false;
            $query = "INSERT INTO users (username, email, phone, age, password) VALUES (:username, :email, :phone, :age, :password)";
            $result = $this->conn->prepare($query);
            $result->bindValue(":username", $user->getUsername(), PDO::PARAM_STR);
            $result->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
            $result->bindValue(":phone", $user->getPhone(), PDO::PARAM_STR);
            $result->bindValue(":age", $user->getAge(), PDO::PARAM_INT);
            $result->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);
            $check = $result->execute();
            if($check){
                return true;
            } else {
                return false;
            }
            // $result->execute([$this->username, $this->email, $this->phone, $this->age, $this->gender, $this->password]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function login(User $user)
    {
        try {
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $result = $this->conn->prepare($query);
            $result->bindValue(":username", $user->getUsername(), PDO::PARAM_STR);
            $result->bindParam(":password", $user->getPassword(), PDO::PARAM_STR);
            $result->execute();
            $check = $result->fetch(PDO::FETCH_ASSOC);
            if($check){
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        $query = $this->conn->prepare("DELETE FROM users WHERE id=:id");
        $result = $this->conn->query($query);
        $result->bindParam(":id", $id);
        $result->execute();
    }
}