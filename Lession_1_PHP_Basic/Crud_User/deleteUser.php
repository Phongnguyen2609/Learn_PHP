<?php
require "connectDb.php";
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "DELETE FROM users WHERE id='$user_id'";
    $result = $conn->query($query);
    if ($result == true) {
        header("location: listUsers.php");
    }
}
