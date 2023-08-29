<?php
include "Animal.php";
class Cat extends Animal
{

    public function eat()
    {
        parent::eat();
        echo "Con {$this->get_Name()} đang ăn cá"."<br>";
    }

    public function sleep()
    {
        echo "Con {$this->get_Name()} đang ngủ"."<br>";
    }

    public function run()
    {
        echo "Con {$this->get_Name()} đang chạy"."<br>";
    }
}

class Dog extends Animal
{

    public function eat()
    {
        parent::eat();
        echo "Con {$this->get_Name()} đang ăn cá"."<br>";
    }

    public function sleep()
    {
        echo "Con {$this->get_Name()} đang ngủ"."<br>";
    }

    public function run()
    {
        echo "Con {$this->get_Name()} đang chạy"."<br>";
    }
}

$cat = new Cat("Mèo", 3, "green");
$dog = new Dog("Dog", 5, "black");
$animals = [$cat, $dog];
foreach ($animals as $animal) {
    echo $animal->eat();
    echo $animal->sleep();
    echo $animal->run();
}
