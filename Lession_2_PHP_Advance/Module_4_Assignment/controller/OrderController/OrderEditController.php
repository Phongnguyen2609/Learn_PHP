<?php
include_once '../../model/Order.php';
include_once '../../model/Product.php';
include_once "../../dao/OrderDao.php";

$errors = array(); // tạo 1 mảng lỗi
$customerId = $productId = $quantity = $total = $shipping = $payment = $created_date = $completion_time = $note = ""; // khởi tạo giá trị
$productQuantity = $productPrice = $newQuantity = $oldQuantityOrder = "";

$order = new Order;
$orderDao = new OrderDao;

$customers = $orderDao->getAllCustomer();
$products = $orderDao->getAllProduct();
$shippings = $orderDao->getAllShipping();
$payments = $orderDao->getAllPayment();
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
    $shipping = test_input($_POST['shipping_id']);
    $payment = test_input($_POST['payment_id']);
    // $created = $order->getCreatedDate();
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

    // lấy ra giá trị của product
    foreach ($productDetail as $item) {
        $productQuantity = $item['quantity'];
        $productPrice = $item['price'];
    }
    if ($quantity > $productQuantity) {
        $errors['quantity'] = "The quantity purchased cannot be greater than the quantity in stock. the remaining number is " . $productQuantity;
    }
    // lấy id product lấy ra giá trị tiền
    $total = intval($quantity) * floatval($productPrice);


    $detailOrder = $orderDao->detailOrder($id);
    foreach($detailOrder as $item){
        $created = $item['created_date'];
        $oldQuantityOrder = $item['quantity'];
    }

    if (empty($dateTime)) {
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
        $order->setTotal($total);
        $order->setShipping($shipping);
        $order->setPayment($payment);
        $order->setCompletionTime($convert_completion_time);
        $order->setNote($note);

        $result = $orderDao->updateOrder($id, $order);

        // update quantity của bảng product
        // sẽ truyền vào 2 giá trị đó là id của product và giá trị của quantity product
        // id thì chính là product_id;
        // quantity sẽ là trừ đi từ quantity order

        // ví dụ  10-(5-7)
        $resultQuantity = $productQuantity - ($quantity - $oldQuantityOrder);
        $ObjProduct = new Product;
        $ObjProduct->setQuantity($resultQuantity);
        $updateProductQuantity = $orderDao->updateProductQuantity($productId, $ObjProduct);
        if ($result) {
            header('location: ../../view/OrderView/OrderListView.php');
        }
    } else {
        include '../../view/OrderView/OrderCreateView.php';
    }
}
