<?php

require_once('Connect.php');
class Module_User extends Connect
{
    private $id;
    private $username;
    private $email;
    private $phone;
    private $age;
    private $gender;


    // Constructor
    public function __construct($username = "", $email = "", $phone = "", $age = "", $gender= "")
    {
        parent::__construct();
        // $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->age = $age;
        $this->gender = $gender;
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

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }


    // Method get data to mysql
    public function getAllData()
    {
        try {
            $stmt = $this->conn->prepare("SELECT username, email, phone, age, gender FROM users");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getData()
    {
        try {
            $stmt = $this->conn->prepare("SELECT username, email, phone, age, gender FROM users WHERE id=?");
            $stmt->execute([$this->id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert()
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO users (username, email, phone, age, gender) VALUES(?,?,?,?,?)");
            $stmt->execute([$this->username, $this->email, $this->phone, $this->age, $this->gender]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update()
    {
        try {
            $stmt = $this->conn->prepare("UPDATE users SET username = ?, email = ?, phone = ?, age = ?, gender =? WHERE id = ?");
            $stmt->execute([$this->username, $this->email, $this->phone, $this->age, $this->gender, $this->id]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete()
    {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->execute([$this->id]);
    }
}
