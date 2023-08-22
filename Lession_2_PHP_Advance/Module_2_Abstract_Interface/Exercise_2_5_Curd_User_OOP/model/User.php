<?php
class User
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

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }
}
