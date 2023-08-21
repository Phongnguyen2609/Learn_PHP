<?php 
include_once "../model/User.php";
$username = $email = $phone = $age = $password = "";
$usernameError = $emailError =  $phoneError = $ageError = $passwordError = "";
$errors = [$usernameError, $emailError, $phoneError, $ageError, $passwordError];

$user = new User();

if(isset($_POST['login'])){
    if (empty($_POST['username'])) {
        $usernameError = "please enter username";
    } else {
        $username = $user->setUsername($_POST['username']);
    }

    if (empty($_POST['password'])) {
        $passwordError = "please enter password";
    } else {
        $password = $user->setPassword($_POST['password']);
    }

    if(empty($usernameError) && empty($passwordError)){
        $user->login($username, $password);
        header("location:../view/listUser.php");
    } else {
        header("location:../view/LoginView.php");
    }
    
}
?>