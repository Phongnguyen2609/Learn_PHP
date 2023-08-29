<?php
include '../../dao/ShippingDao.php';

$shippingDao = new ShippingDao;
$query = "SELECT id, shipping_type FROM shipping";
$shippings = $shippingDao->getAllShipping($query);

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $shippingDao->deleteShipping($id);
    if($result){
        header('location: ../../view/ShippingView/ShippingListView.php');
    }
}