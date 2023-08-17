<?php
include_once "Shape.php";

class Circle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea()
    {
        echo "Calculate Area: ". $this->width * $this->height . "<br>";
    }

    public function calculatePerimeter()
    {
         echo "Calculate Perimeter: ". ($this->width + $this->height ) * 2 . "<br>";
    }
}