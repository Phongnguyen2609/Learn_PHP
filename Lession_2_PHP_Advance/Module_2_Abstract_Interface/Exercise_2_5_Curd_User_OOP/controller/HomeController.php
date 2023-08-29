<?php
require '../dao/Crud.php';
session_start();

$crud = new Crud;
$check = $crud->getAllData();



?>