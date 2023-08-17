<?php
require_once "Car.php";

class GasolineCar extends Car{
    protected $fuelType;

    public function __construct($name, $color, $price, $fuelType)
    {
        parent::__construct($name, $color, $price, $fuelType);
        $this->fuelType = $fuelType;
    }

    public function run() {
        echo "Car: {$this->name} Color: {$this->color} Price: {$this->price} FeulType: {$this->fuelType}";
    }
}