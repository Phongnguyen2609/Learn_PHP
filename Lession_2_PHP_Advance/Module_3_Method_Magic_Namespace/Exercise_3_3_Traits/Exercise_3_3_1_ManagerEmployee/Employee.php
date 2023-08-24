<?php

include 'EmployeeInfor.php';
class Employee
{

    use EmployeeInfor;

    public function __construct($fullname, $address,$age, $email, $phone)
    {
        $this->setEmployyeeInfor($fullname, $address, $age, $email, $phone);
    }

    public function getEmployeeInfor()
    {
        echo $this->fullname ."<br>";
        echo $this->age ."<br>";
        echo $this->address ."<br>";
        echo $this->email ."<br>";
        echo $this->phone ."<br>";
    }
}

$employee = new Employee(
    "Nguyen Thanh Phong",
    30,
    'Ha Noi',
    'phong@gmail.com',
    '0964276534'
);
echo $employee->getEmployeeInfor();
