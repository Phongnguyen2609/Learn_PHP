<?php
include '../../dao/PaymentDao.php';

$paymentDao = new PaymentDao;
$payments = $paymentDao->getAllPayment();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $paymentDao->deletePayment($id);
    if($result){
        header('location: ../../view/ShippingView/ShippingListView.php');
    }
}