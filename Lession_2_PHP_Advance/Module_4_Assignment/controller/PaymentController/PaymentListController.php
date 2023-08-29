<?php
include '../../dao/PaymentDao.php';

$paymentDao = new PaymentDao;
$query = "SELECT id, payment_type FROM payments";
$payments = $paymentDao->getAllPayment($query);

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $paymentDao->deletePayment($id);
    if($result){
        header('location: ../../view/PaymentView/PaymentListView.php');
    }
}