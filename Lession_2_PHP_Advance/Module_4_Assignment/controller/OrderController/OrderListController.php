<?php
include '../../dao/OrderDao.php';

$orderDao = new OrderDao;
$query = 'SELECT od.id, c.username, p.name, od.quantity, od.total, s.shipping_type, payments.payment_type, od.created_date, od.completion_time, od.note FROM orders as od left join customers as c ON od.customer_id = c.id left join products as p ON od.product_id = p.id LEFT JOIN shipping s ON od.shipping_id = s.id LEFT JOIN payments ON od.payment_id = payments.id';
$orders = $orderDao->getAllOrderMultipTable($query);

$resultTotalOrder = $resultQuantity = $resultIndex = ""; 
$resultIndex = $orderDao->getCountOrder();
$resultQuantity = $orderDao->getSumQuantityOrder();
$resultTotalOrder = $orderDao->getSumTotalOrder();

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $orderDao->deleteOrder($id);
    if($result){
        header('location: ../../view/OrderView/OrderListView.php');
    }
}