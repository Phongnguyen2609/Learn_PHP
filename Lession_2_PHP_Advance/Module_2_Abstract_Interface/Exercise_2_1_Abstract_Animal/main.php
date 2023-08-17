<?php

include "Cat.php";
include "Dog.php";

$dog = new Dog();
$cat = new Cat();

$animals = [$dog, $cat];
foreach($animals as $item){
    $item->eat();
}