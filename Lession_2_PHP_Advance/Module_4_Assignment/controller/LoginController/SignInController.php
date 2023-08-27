<?php
include '../../model/Customer.php';
include "../../dao/CustomerDao.php";

$errors = array();
$username = $email = $phone = $address = "";

if (isset($_POST['SignIn'])) {

    $customer = new Customer;
    $customerDao = new CustomerDao;

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    if (empty($username)) {
        $errors['username'] = 'please enter username';
    }

    if (empty($password)) {
        $errors['password'] = 'please enter password';
    } else if (strlen($password) < 5) {
        $errors['password'] = 'password must greate than 5 characters';
    }

    if (count($errors) === 0) {
        $customer->setUsername($username);
        $customer->setPassword($password);

        $result = $customerDao->SignIn($customer);

        if ($result) {

                header('location: ../../view/CustomerView/CustomerListView.php');
        }
    } else {
        include '../../view/LoginView/SignInView.php';
        // include '';
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
