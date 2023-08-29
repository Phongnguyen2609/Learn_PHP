<?php

include '../../model/Customer.php';
include "../../dao/CustomerDao.php";

$errors = array();
$username = $email = $phone = $address = "";

if (isset($_POST['submit'])) {

    $customer = new Customer;
    $customerDao = new CustomerDao;

    // dữ liệu nhập từ
    $id = test_input($_POST['id']);
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $address = test_input($_POST['address']);
    // validate dữ liệu đầu vào
    if (empty($username)) {
        $errors['username'] = 'please enter username';
    }
    $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
    if (empty($email)) {
        $errors['email'] = 'please enter email';
    } else if (!preg_match($pattern, $email)) {
        $errors['email'] = 'please Enter the correct format of the email';
    }
    $pattern_phone =  '/^0\d{9,10}$/';
    if (empty($phone)) {
        $errors['phone'] = 'please enter phone';
    } else if (!preg_match($pattern_phone, $phone)) {
        $errors['phone'] = 'phone number can only enter number';
    }
    if (empty($address)) {
        $errors['address'] = 'please enter address';
    }

    // Nếu không có lỗi thì mới cho thực hiện 
    if (count($errors) === 0) {
        // truyền dữ liệu vào model thông qua phương thức setter
        $customer->setUsername($username);
        $customer->setEmail($email);
        $customer->setPhone($phone);
        $customer->setAddress($address);

        // nếu mà id === 0 or id rỗng thì cho thực hiện add
        if (empty($id)) {
            // thực thi câu lệnh mysql
            $result = $customerDao->addCustomer($customer);
            if ($result) {
                header('location: ../../view/CustomerView/CustomerListView.php');
            }
        } else {
            // thực thi câu lệnh mysql
            $result = $customerDao->updateCustomer($id, $customer);
            if ($result) {
                header('location: ../../view/CustomerView/CustomerListView.php');
            }
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
