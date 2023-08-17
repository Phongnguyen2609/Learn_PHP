<?php
class User {
    private $username;
    private $email;
    private $password;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    } 

    // Setter + Getter

    public function getUsername(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    // đăng nhập
    public function signIn($username, $password){
        if($username === $this->username && $password === $this->password){
            return true;
        } else {
            return false;
        }
    }

    // đăng ký
    public function signUp($username, $email, $password){
        $this->username = $username;
        $this->username = $email;
        $this->username = $password;
    }
}