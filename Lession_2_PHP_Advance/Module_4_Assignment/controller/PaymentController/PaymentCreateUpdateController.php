<?php
include_once '../../model/Payment.php';
include_once '../../dao/PaymentDao.php';

$errors = array();
$paymentType = $result = "";

// khởi tạo đối tượng
$payment = new Payment();
$paymentDao = new PaymentDao;

if(isset($_POST['submitPayment'])){
    $id = test_input($_POST['id']);

    $paymentType = test_input($_POST['payment_type']);
    
    if(empty($paymentType)){
        $errors['payment_type'] = "please enter payment type";
    }

    if(!count($errors)){
        $payment->setPaymentType($paymentType);

        if(empty($id)){
            $result = $paymentDao->addPayment($payment);
            if($result){
                header('location:../../view/PaymentView/PaymentListView.php');
            }
        } else {
            $result = $paymentDao->updatePayment($id, $payment);
            if($result){
                header('location:../../view/PaymentView/PaymentListView.php');
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