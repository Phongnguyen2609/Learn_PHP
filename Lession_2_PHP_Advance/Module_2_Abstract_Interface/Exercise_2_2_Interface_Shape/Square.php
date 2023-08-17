<?php
include_once "Shape.php";
class Square implements Shape{
    private $width;

    public function __construct($width)
    {
        $this->width = $width;
    }
    public function calculateArea()
    {
        echo "Calculate Area: ".$this->width * $this->width . "<br>";
    }

    public function calculatePerimeter()
    {
        echo "Calculate Perimeter: ".$this->width * 4 . "<br>";
    }
}