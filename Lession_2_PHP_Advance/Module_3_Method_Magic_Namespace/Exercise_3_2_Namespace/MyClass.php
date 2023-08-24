<?php
namespace MyNamespace;

class MyClass {
    public function myMethod(){
        echo "Hello World".'<br>';
    }
}

$myClass = new MyClass();
$myClass->myMethod();