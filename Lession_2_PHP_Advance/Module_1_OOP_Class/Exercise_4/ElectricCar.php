<?php
require_once "Car.php";

class ElectricCar extends Car{
    protected $batteryCapacity;

    public function __construct($name, $color, $price, $batteryCapacity)
    {
        parent::__construct($name, $color, $price);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function run() {
        echo "Car: {$this->name} Color: {$this->color} Price: {$this->price} BatteryCapacity: {$this->batteryCapacity}"."<br>";
    }
}