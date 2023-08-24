<?php
trait EmployeeInfor{
    public $fullname;
    public $age;
    public $address;
    public $email;
    public $phone;

    public function setEmployyeeInfor($fullname, $address, $age, $email, $phone){
        $this->fullname = $fullname;
        $this->age = $age;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
    }
}