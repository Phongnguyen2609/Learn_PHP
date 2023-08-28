<?php

include '../../model/Product.php';
include "../../dao/ProductDao.php";

$errors = array();
$name = $image = $price = $quantity = $description = "";

if (isset($_POST['submit'])) {

    $product = new Product;
    $productDao = new ProductDao;

    $name = test_input($_POST['name']);
    $price = test_input($_POST['price']);
    $quantity = test_input($_POST['quantity']);
    $description = test_input($_POST['description']);

    if (empty($name)) {
        $errors['name'] = 'please enter product name';
    }

    if (empty($price)) {
        $errors['price'] = 'please enter price';
    } else if ($price < 0) {
        $errors['quantity'] = "price can't less than 0";
    }

    if (empty($quantity)) {
        $errors['quantity'] = 'please enter address';
    } else if ($quantity < 0) {
        $errors['quantity'] = "quantity can't less than 0";
    }

    if (count($errors) === 0) {
        $product->setName($name);
        $product->setPrice($price);
        $product->setQuantity($quantity);
        $product->setDescription($description);
        $result = $productDao->addProduct($product);

        if ($result) {
            header('location: ../view/ProductView/ProductCreateView.php');
        }
    } else {
        include '../view/ProductView/ProductCreateView.php';
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
