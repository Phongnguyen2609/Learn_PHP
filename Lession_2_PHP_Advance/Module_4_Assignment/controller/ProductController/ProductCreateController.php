<?php

include '../../model/Product.php';
include "../../dao/ProductDao.php";

$errors = array();
$name = $image = $price = $quantity = $description = "";

if (isset($_POST['submit'])) {

    $product = new Product;
    $productDao = new ProductDao;

    // $target_dir = "D:\learning\Studying\Learn_PHP\Lession_2_PHP_Advance\Module_4_Assignment\uploads/";

    $name = test_input($_POST['name']);
    $image = $_POST['fileUpload'];
    $price = test_input($_POST['price']);
    $quantity = test_input($_POST['quantity']);
    $description = test_input($_POST['description']);
    if(isset($image)){
        $imageName = $_FILES["fileUpload"]["name"];
        $imageTmp = $_FILES['fileUpload']['tmp_name'];
        // read the file content
        $fileContent = file_get_contents($imageTmp);
        // $targetFile = $target_dir.$image;
        // move_uploaded_file($image_tmp, $targetFile);
    }

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
        $product->setImage($image);
        $product->setPrice($price);
        $product->setQuantity($quantity);
        $product->setDescription($description);
        $result = $productDao->addProduct($product);

        if ($result) {
            header('location: ../view/ProductListView.php');
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
