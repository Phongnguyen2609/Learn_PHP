<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'demo';

    $conn = new mysqli($servername, $username, $password, $db_name, 4306);
    if ($conn->connect_errno) {
        throw new RuntimeException('mysqli connection error: ' . $conn->connect_error);
    }
    // echo "Connected successfully";
