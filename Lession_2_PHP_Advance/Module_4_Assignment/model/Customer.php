<?php
class Customer {
    private $id;
    private $username;
    private $email;
    private $phone;
    private $address;
    private $role;
    private $password;

    public function __construct($username = "",  $email = "",  $phone ="", $address ="", $role = "", $password = "")
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->role = $role;
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
    
        public function setAddress($address)
        {
            $this->address = $address;
        }
    
        public function getAddress()
        {
            return $this->address;
        }

        public function setRole($role)
        {
            $this->role = $role;
        }
    
        public function getRole()
        {
            return $this->role;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }
    
        public function getPassword()
        {
            return $this->password;
        }
}