<?php
include_once "Animal.php";

class Dog extends Animal {
    public function eat()
    {
        echo "The dog loves to eat sausages"."<br>";
    }
}