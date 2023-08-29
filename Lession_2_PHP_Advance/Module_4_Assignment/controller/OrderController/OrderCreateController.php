<?php
include_once '../../model/Order.php';
include_once '../../model/Product.php';
include_once "../../dao/OrderDao.php";

$errors = array(); // tạo 1 mảng lỗi
$customerId = $productId = $quantity = $total = $shippingId = $paymentId = $created_date = $completion_time = $note = ""; // khởi tạo giá trị

$order = new Order;
$orderDao = new OrderDao;
// gọi câu lệnh lấy ra danh sách
$customers = $orderDao->getAllCustomer();
$products = $orderDao->getAllProduct();
$shippings = $orderDao->getAllShipping();
$payments = $orderDao->getAllPayment();

if (isset($_POST['submitOrder'])) {

    $customerId = test_input($_POST['customer_id']);
    $productId = test_input($_POST['product_id']);
    $quantity = test_input($_POST['quantity']);

    $shippingId = test_input($_POST['shipping_id']);
    $paymentId = test_input($_POST['payment_id']);

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

    // Từ productId ở trên sẽ lấy ra product detail 
    // và lấy ra được giá trị của product
    $productDetail = $orderDao->detailProduct($productId); // gọi đến productDetai
    $productQuantity = $productPrice = "";
    // cho vào vòng lặp để lấy ra các giá trị trong product
    foreach ($productDetail as $item) {
        $productQuantity = $item['quantity'];
        $productPrice = $item['price'];
    }
    // OrderQuantity sẽ không được lớn hơn ProductQuantity Nếu không sẽ báo lỗi
    if ($quantity > $productQuantity) {
        $errors['quantity'] = "The quantity purchased cannot be greater than the quantity in stock. the remaining number is " . $productQuantity;
    }

    // Tính Total = OrderQuantity * ProductPrice
    $total = intval($quantity) * floatval($productPrice);

    if (empty($dateTime)) {
        $errors['completion_time'] = "please enter completion date";
    }

    // so sánh ngày hiện tại với ngày giao hàng
    // ngày giao hàng không thể nhỏ hơn ngày hiện tại
    $compareResult = strcmp($created, $convert_completion_time);
    if ($compareResult > 0) {
        $errors['completion_time'] = "Delivery date must not be less than order creation date";
    }

    if (empty($shippingId)) {
        $errors['shipping_id'] = "please choose shipping";
    }

    if (empty($paymentId)) {
        $errors['payment_id'] = "please choose payment";
    }

    // Nếu không có lỗi thì sẽ được truyền vào Obj order thông qua phương thức setter
    if (count($errors) === 0) {
        $order->setCustomerId($customerId);
        $order->setProductId($productId);
        $order->setQuantity($quantity);
        $order->setTotal($total);
        $order->setShippingId($shippingId);
        $order->setPaymentId($paymentId);
        $order->setCreatedDate($created);
        $order->setCompletionTime($convert_completion_time);
        $order->setNote($note);

        // thực thi câu lệnh addOrder
        $result = $orderDao->addOrder($order);

        // Khi add order thành công . Product sẽ trừ đi OrderQuantity
        // và update lại  Product Quantity của bảng product
        // Khi update sẽ truyền vào 2 giá trị đó là id của product và giá trị của quantity product
        // id thì chính là product_id;
        $resultQuantity = $productQuantity - $quantity;
        $ObjProduct = new Product;
        $ObjProduct->setQuantity($resultQuantity);
        $updateProductQuantity = $orderDao->updateProductQuantity($productId, $ObjProduct);

        if ($result === true && $updateProductQuantity == true) {
            header('location: ../../view/OrderView/OrderListView.php');
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
