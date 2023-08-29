<?php
include '../../dao/CustomerDao.php';

$customerDao = new CustomerDao;
$query = "SELECT id, username, email, phone, address FROM customers";
$customers = $customerDao->getAllData($query);

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $customerDao->customer_delete($id);
    if($result){
        header('../../view/CustomerView/CustomerListView.php');
    }
}