<?php
include_once "Animal.php";

class Cat extends Animal{
    public function eat()
    {
        echo "The Cat favorite fish"."<br>";
    }
}