<?php

include_once "Circle.php";
include_once "Square.php";

$square = new Square(5);
$circle = new Circle(10, 5);

$shapes = [$square, $circle];

foreach($shapes as $item){
    $item->calculateArea();
    $item->calculatePerimeter();
}