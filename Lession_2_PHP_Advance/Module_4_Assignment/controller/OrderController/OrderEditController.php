<?php
include_once '../../model/Order.php';
include_once "../../dao/OrderDao.php";

$errors = array(); // tạo 1 mảng lỗi
$customerId = $productId = $quantity = $total = $shipping = $payment = $created_date = $completion_time = $note = ""; // khởi tạo giá trị

$order = new Order;
$orderDao = new OrderDao;

$customers = $orderDao->getAllCustomer();
$products = $orderDao->getAllProduct();
if (isset($_POST['submitEditOrder'])) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = test_input($_POST['id']);
    $customerId = test_input($_POST['customer_id']);
    $productId = test_input($_POST['product_id']);
    $quantity = test_input($_POST['quantity']);
    $shipping = test_input($_POST['shipping']);
    $payment = test_input($_POST['payment']);
    // $created = $order->getCreatedDate();
    $dateTime = test_input($_POST['completion_time']);
    $completion_time = new DateTime($dateTime);

    $convert_completion_time = $completion_time->format('Y-m-d');

    // var_dump($convert_completion_date);
    // die;

    $note = test_input($_POST['note']);

    if (empty($customerId)) {
        $errors['customer_id'] = "please choose customer";
    }

    if (empty($productId)) {
        $errors['product_id'] = "please choose product";
    }

    if (empty($quantity)) {
        $errors['quantity'] = "please enter quantity";
    }

    // if()
    if (empty($completion_time)) {
        $errors['completion_date'] = "please enter completion date";
    }

    $compareResult = strcmp($created, $convert_completion_time);
    if ($compareResult > 0) {
        $errors['completion_time'] = "Delivery date must not be less than order creation date";
    }

    if (count($errors) === 0) {
        $order->setCustomerId($customerId);
        $order->setProductId($productId);
        $order->setQuantity($quantity);
        $order->setShipping($shipping);
        $order->setPayment($payment);
        $order->setCompletionTime($convert_completion_time);
        $order->setNote($note);

        $result = $orderDao->updateOrder($id, $order);
        // var_dump($result);
        // die;
        if ($result) {
            header('location: ../../view/OrderView/OrderListView.php');
        }
    } else {
        include '../../view/OrderView/OrderCreateView.php';
    }
}
