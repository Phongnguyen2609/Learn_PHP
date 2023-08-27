<?php

include '../../model/Customer.php';
include "../../dao/CustomerDao.php";

$errors = array();
$username = $email = $phone= $address = "";

if(isset($_POST['submit'])){

    $customer = new Customer;
    $customerDao = new CustomerDao;

    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $address = test_input($_POST['address']);
    $password = test_input($_POST['password']);
    if(empty($username)){
        $errors['username'] = 'please enter username';
    }

    $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
    if(empty($email)){
        $errors['email'] = 'please enter email';
    } else if (!preg_match($pattern, $email)){
        $errors['email'] = 'please Enter the correct format of the email';
    }

    $pattern_phone =  '/^0\d{9,10}$/';
    if(empty($phone)){
        $errors['phone'] = 'please enter phone';
    } else if (!preg_match($pattern_phone, $phone)){
        $errors['phone'] = 'phone number can only enter number';
    }

    if(empty($address)){
        $errors['address'] = 'please enter address';
    }

    if(empty($password)){
        $errors['password'] = 'please enter password';
    } else if(strlen($password) <5){
        $errors['password'] = 'password must greate than 5 characters';
    }

    if(count($errors) === 0){
        $customer->setUsername($username);
        $customer->setEmail($email);
        $customer->setPhone($phone);
        $customer->setAddress($address);
        // $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $customer->setPassword($password);


        $result = $customerDao->database_add($customer);
        if($result){
           header('location: ../../view/CustomerView/CustomerListView.php');
        }
    } else {
        include '../../view/CustomerView/CustomerCreateView.php';
    }

}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}