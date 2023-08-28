<?php
include '../../dao/ShippingDao.php';

$shippingDao = new ShippingDao;
$shippings = $shippingDao->getAllShipping();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $shippingDao->deleteShipping($id);
    if($result){
        header('location: ../../view/ShippingView/ShippingListView.php');
    }
}