<?php

require('Crud.php');
class User extends Crud
{
    private $id;
    private $username;
    private $email;
    private $phone;
    private $age;
    private $password;


    // Constructor
    public function __construct($username = "",  $email = "",  $phone ="", $age ="", $password = "")
    {
        parent::__construct();
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->age = $age;
        $this->password = $password;
    }

    // SETTER + GETTER
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    // public function setGender($gender)
    // {
    //     $this->gender = $gender;
    // }

    // public function getGender()
    // {
    //     return $this->gender;
    // }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function insert()
    {
        try {
            $query = "INSERT INTO users (username, email, phone, age, password) VALUES (:username, :email, :phone, :age, :password)";
            $result = $this->conn->prepare($query);
            $result->bindValue(":username", $this->username, PDO::PARAM_STR);
            $result->bindValue(":email", $this->email, PDO::PARAM_STR);
            $result->bindValue(":phone", $this->phone, PDO::PARAM_STR);
            $result->bindValue(":age", $this->age, PDO::PARAM_INT);
            $result->bindValue(":password", $this->password, PDO::PARAM_STR);
            $result->execute();
            // $result->execute([$this->username, $this->email, $this->phone, $this->age, $this->gender, $this->password]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function login()
    {
        try {
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $result = $this->conn->prepare($query);
            $result->bindValue(':username', $this->username, PDO::PARAM_STR);
            $result->bindParam(":password", $this->password, PDO::PARAM_STR);
            $result->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
