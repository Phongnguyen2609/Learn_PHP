<?php
include '../../dao/ProductDao.php';

$crud = new ProductDao;
$query = "SELECT id, name, price, quantity, description FROM products";
$products = $crud->getAllData($query);

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $result = $crud->deleteProduct($id);
    if ($result) {
        header('location: ../view/ProductView/ProductListView.php');
    }
}
