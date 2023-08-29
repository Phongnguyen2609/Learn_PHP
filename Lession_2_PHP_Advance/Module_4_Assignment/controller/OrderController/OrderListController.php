<?php
include '../../dao/OrderDao.php';

$orderDao = new OrderDao; // tạo 1 Obj orderDao
$query = 'SELECT od.id, c.username, p.name, od.quantity, od.total, s.shipping_type, payments.payment_type, od.created_date, od.completion_time, od.note FROM orders as od left join customers as c ON od.customer_id = c.id left join products as p ON od.product_id = p.id LEFT JOIN shipping s ON od.shipping_id = s.id LEFT JOIN payments ON od.payment_id = payments.id';
// => đến phương thức lấy dữ liệu của Order
$orders = $orderDao->getAllOrderMultipTable($query);

// phương thức này dùng để tính đơn hàng , tính tổng quantity và tính tổng số tiền mua hàng
$resultTotalOrder = $resultQuantity = $resultIndex = "";
$resultIndex = $orderDao->getCountOrder();
$resultQuantity = $orderDao->getSumQuantityOrder();
$resultTotalOrder = $orderDao->getSumTotalOrder();

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $result = $orderDao->deleteOrder($id);
    if ($result) {
        header('location: ../../view/OrderView/OrderListView.php');
    }
}
