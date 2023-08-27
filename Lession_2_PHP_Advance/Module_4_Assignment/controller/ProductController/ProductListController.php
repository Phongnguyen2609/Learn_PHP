<?php
include '../../dao/ProductDao.php';

$crud = new ProductDao;
$query = "SELECT id, name, image, price, quantity, description FROM products";
$cruds = $crud->getAllData($query);

// var_dump($cruds);
// die();

// $products = $result->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['id'])){

    $id = $_GET['id'];
    $result = $crud->deleteProduct($id);
    if($result){
        header('location: ../view/ProductView/ProductListView.php');
    }
}