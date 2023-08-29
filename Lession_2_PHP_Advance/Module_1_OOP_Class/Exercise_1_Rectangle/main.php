<?php 
require_once "Rectangle.php";
require_once "Square.php";

$rectangle = new Rectangle(4, 6);
$square = new Square(5);

echo "diện tích hình chữ nhật: " . $rectangle->dienTich() . "<br>";
echo "diện tích chu vi chữ nhật: " . $rectangle->chuVi() . "<br>";

echo "diện tích hình chữ nhật: " . $square->dienTich() . "<br>";
echo "diện tích chu vi chữ nhật: " . $square->chuVi() . "<br>";