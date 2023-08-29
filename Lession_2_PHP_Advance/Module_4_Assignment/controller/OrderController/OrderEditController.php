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

    // Từ productId ở trên sẽ lấy ra product detail 
    // và lấy ra được giá trị của product
    $productDetail = $orderDao->detailProduct($productId);

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

    // khi update lại thời gian của ngày giao hàng 
    // thì phải gọi đến order detail để lấy ra được ngày tạo của order 
    // và lấy ra giá trị của Order Quantity cũ 
    $detailOrder = $orderDao->detailOrder($id);
    foreach ($detailOrder as $item) {
        $created = $item['created_date'];
        $oldQuantityOrder = $item['quantity'];
    }

    if (empty($dateTime)) {
        $errors['completion_time'] = "please enter completion date";
    }
    // so sánh ngày giao hàng muốn update với ngày tạo đơn hàng
    $compareResult = strcmp($created, $convert_completion_time);
    if ($compareResult > 0) {
        $errors['completion_time'] = "Delivery date must not be less than order creation date";
    }

    // Nếu không có lỗi thì sẽ được truyền vào Obj order thông qua phương thức setter
    if (count($errors) === 0) {
        $order->setCustomerId($customerId);
        $order->setProductId($productId);
        $order->setQuantity($quantity);
        $order->setTotal($total);
        $order->setShippingId($shipping);
        $order->setPaymentId($payment);
        $order->setCompletionTime($convert_completion_time);
        $order->setNote($note);

        // thực thi câu lệnh updateOrder
        $result = $orderDao->updateOrder($id, $order);

        // khi update lại Order Quantity thì cũng phải update Lại Product Quantity luôn nếu tăng hoặc giảm
        // sẽ truyền vào 2 giá trị đó là id của product và giá trị của quantity product
        // id thì chính là product_id;
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
