<?php

class Person {
    // protected $name;
    private $name;
    public function __get($property){
        // kiểm tra xem có tồn tại hay không
        if(!property_exists($this, $property)){
           throw new Error ("property {$property} does not ");
        }
        return $this->{$property};
    }

    public function getName(){
        echo $this->name;
    }
}

$person = new Person();
$person->name = "Phong nguyễn";
$person->getName();