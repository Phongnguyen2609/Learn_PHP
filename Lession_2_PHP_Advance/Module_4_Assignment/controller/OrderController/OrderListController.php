<?php
include '../../dao/OrderDao.php';

$order = new OrderDao;
$orders = $order->getAllOrderMultipTable();

$resultTotalOrder = $resultQuantity = $resultIndex = ""; 

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $order->deleteOrder($id);
    if($result){
        header('location: ../../view/OrderView/OrderListView.php');
    }
}