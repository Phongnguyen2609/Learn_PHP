<?php 

class Math{
    public static function add($a , $b){
        echo "tổng 2 số là = " .$a +$b ."<br>";
    }

    public static function sub($a , $b){
        echo "hiệu 2 số là = " .$a - $b. "<br>";
    }

    public static function multiply($a , $b){
        echo "Thương của 2 số là = ".$a * $b."<br>";
    }
    
}

// $math = new Math();
$a = 10;
$b = 5;
$add = Math::add($a, $b);
$sub = Math::sub($a, $b);
$multiply= Math::multiply($a, $b);