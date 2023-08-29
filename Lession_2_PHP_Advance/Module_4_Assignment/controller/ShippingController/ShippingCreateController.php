<?php
include_once '../../model/Shipping.php';
include_once '../../dao/ShippingDao.php';

$errors = array();
$shippingType = $result = "";

// khởi tạo đối tượng
$shipping = new Shipping();
$shippingDao = new ShippingDao;

if (isset($_POST['submitShipping'])) {
    $id = test_input($_POST['id']);

    $shippingType = test_input($_POST['shipping_type']);

    if (empty($shippingType)) {
        $errors['shipping_type'] = "please enter shipping type";
    }

    if (!count($errors)) {
        $shipping->setShippingType($shippingType);

        if (empty($id)) {
            $result = $shippingDao->addShipping($shipping);
            if ($result) {
                header('location:../../view/ShippingView/ShippingListView.php');
            }
        } else {
            $result = $shippingDao->updateShipping($id, $shipping);
            if ($result) {
                header('location:../../view/ShippingView/ShippingListView.php');
            }
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
