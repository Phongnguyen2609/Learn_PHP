<?php
include_once '../../model/Order.php';
include_once '../../model/Product.php';
include_once "../../dao/OrderDao.php";
// include_once "../../dao/ProductDao.php";

$errors = array(); // tạo 1 mảng lỗi
$customerId = $productId = $quantity = $total = $shipping = $payment = $created_date = $completion_time = $note = ""; // khởi tạo giá trị

$order = new Order;
$orderDao = new OrderDao;
// $productDao = new ProductDao;

$customers = $orderDao->getAllCustomer();
$products = $orderDao->getAllProduct();
if (isset($_POST['submitOrder'])) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $customerId = test_input($_POST['customer_id']);
    $productId = test_input($_POST['product_id']);
    $quantity = test_input($_POST['quantity']);
    $shipping = test_input($_POST['shipping']);
    $payment = test_input($_POST['payment']);

    // ngày tạo là ngày đặt order
    $created_date = new DateTime();
    $created = $created_date->format('Y-m-d H:i:s');

    $dateTime = test_input($_POST['completion_time']);
    $completion_time = new DateTime($dateTime);
    $convert_completion_time = $completion_time->format('Y-m-d');

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

    //check dữ liệu quantity
    $productDetail = $orderDao->detailProduct($productId);
    $productQuantity = $productPrice = "";
    foreach($productDetail as $item){
        $productQuantity = $item['quantity'];
        $productPrice = $item['price'];
    }
    if($quantity > $productQuantity){
        $errors['quantity'] = "The quantity purchased cannot be greater than the quantity in stock. the remaining number is " . $productQuantity;
    }

    // if()
    if (empty($completion_time)) {
        $errors['completion_time'] = "please enter completion date";
    }

    $compareResult = strcmp($created, $convert_completion_time);
    if ($compareResult > 0) {
        $errors['completion_time'] = "Delivery date must not be less than order creation date";
    }

    if (count($errors) === 0) {
        $order->setCustomerId($customerId);
        $order->setProductId($productId);
        $order->setQuantity($quantity);
        // lấy id product lấy ra giá trị tiền
        $total = $quantity * $productPrice;
        $order->setTotal($total);
        $order->setShipping($shipping);
        $order->setPayment($payment);
        $order->setCreatedDate($created);
        $order->setCompletionTime($convert_completion_time);
        $order->setNote($note);


        $result = $orderDao->addOrder($order);

        // update quantity của bảng product
        // sẽ truyền vào 2 giá trị đó là id của product và giá trị của quantity product
        // id thì chính là product_id;
        // quantity sẽ là trừ đi từ quantity order
        $resultQuantity = $productQuantity - $quantity;
        $ObjProduct = new Product;
        $ObjProduct->setQuantity($resultQuantity);
        $updateProductQuantity = $orderDao->updateProductQuantity($productId, $ObjProduct);

        if ($result === true && $updateProductQuantity == true) {
            header('location: ../../view/OrderView/OrderListView.php');
        }
    } else {
        include '../../view/OrderView/OrderCreateView.php';
    }
}
