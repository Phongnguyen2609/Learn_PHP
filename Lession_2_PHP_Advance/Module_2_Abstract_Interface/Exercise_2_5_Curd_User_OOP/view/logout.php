<?php
    session_unset(); // Xóa tất cả biến phiên
    session_destroy(); // Hủy phiên

    header("location: ./LoginView.php");
?>