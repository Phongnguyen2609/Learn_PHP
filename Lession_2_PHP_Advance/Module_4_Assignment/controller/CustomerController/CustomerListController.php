<?php
include '../../dao/CustomerDao.php';
// khởi tạo 1 obj 
$customerDao = new CustomerDao;
// cây lệnh hiển thị ra danh sách customers
$query = "SELECT id, username, email, phone, address FROM customers";
// thực thi câu lệnh
$customers = $customerDao->getAllData($query);

// lấy ra được giá trị của id
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    // thực thi câu lệnh 
    $result = $customerDao->customer_delete($id);
    if ($result) {
        header('../../view/CustomerView/CustomerListView.php');
    }
}
