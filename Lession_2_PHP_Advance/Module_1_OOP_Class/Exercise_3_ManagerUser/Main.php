<?php
include "Administrator.php";
// include "User.php";

$user = new User("user", "admin@gmail.com", "123456");
// $user->signUp("admin", "admin@gmail.com", "123456");
if($user->signIn("user", "123456"))
    echo "User Login Successfully"."<br>";
else 
    echo "User Login Failed"."<br>";



$admin = new Administrator("admin", "admin@gmail.com", "123456");
if($admin->signIn("admin", "123456"))
    echo "Admin Login Successfully"."<br>";
else 
    echo "Admin Login Failed"."<br>";
