<?php
include '../../dao/CustomerDao.php';

$customerDao = new CustomerDao;
$customers = $customerDao->getAllData();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $customerDao->customer_delete($id);
    if($result){
        header('../../view/CustomerView/CustomerListView.php');
    }
}