<?php

class Person {
    // protected $name;
    private $name;
    private $email;

    public function __set($key, $value)
    {
        if(property_exists($this, $key)){
            $this->$key = $value;
        } else {
            die('khong ton tai thuoc tinh');
        }
    }
    public function __get($property){
        // kiểm tra xem có tồn tại hay không
        if(!property_exists($this, $property)){
           throw new Error ("property {$property} does not ");
        }
        return $this->{$property};
    }

    public function getName(){
        echo $this->name."<br>";
    }

    public function getEmail(){
        echo $this->email."<br>";
    }
}

$person = new Person();
$person->name = "Phong nguyễn";
$person->email = "Phongnguyen@gmail.com";
$person->getName();
$person->getEmail();
// echo $person->email;