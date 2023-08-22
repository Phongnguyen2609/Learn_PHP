<?php
require '../dao/Crud.php';
session_start();

$crud = new Crud;
$check = $crud->getAllData();

// if(count($check) != 0){
//     include '../view/listUser.php';
// }

?>