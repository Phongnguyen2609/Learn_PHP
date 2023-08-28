<?php
class Customer
{
    private $id;
    private $username;
    private $email;
    private $phone;
    private $address;

    public function __construct($username = "",  $email = "",  $phone = "", $address = "")
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
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

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
