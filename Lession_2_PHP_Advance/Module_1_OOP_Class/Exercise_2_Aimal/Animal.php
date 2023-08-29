<?php
class Animal {
    private $name;
    private $age;
    private $color;

    public function __construct($name, $age, $color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    public function get_Name(){
        return $this->name;
    }

    public function get_Age(){
        return $this->name;
    }

    public function get_Color(){
        return $this->name;
    }

    public function eat(){
       
    }

    public function sleep(){

    }

    public function run(){

    }
}