<?php
include_once "../model/User.php";
include_once "../model/Validation.php";

$username = $email = $phone = $age = $password = "";
$usernameError = $emailError =  $phoneError = $ageError = $passwordError = "";
$errors = [$usernameError, $emailError, $phoneError, $ageError, $passwordError];

$user = new User();

if(isset($_POST['submit'])) {
    if (empty($_POST['username'])) {
        $usernameError = "please enter username";
    } else {
        $username = $user->setUsername($_POST['username']);
    }

    if (empty($_POST['email'])) {
        $emailError = "please enter email";
    } else {
        $email = $user->setEmail($_POST['email']);
    }

    if (empty($_POST['phone'])) {
        $phoneError = "please enter phone";
    } else {
        $phone = $user->setPhone($_POST['phone']);
    }

    if (empty($_POST['age'])) {
        $ageError = "please enter age";
    } else {
        $age = $user->setAge($_POST['age']);
    }

    if (empty($_POST['password'])) {
        $passwordError = "please enter password";
    } else {
        $password = $user->setPassword($_POST['password']);
    }

    if(empty($usernameError) && empty($emailError) && empty($phoneError) && empty($ageError) && empty($passwordError)){
        $user->insert($username, $email, $phone, $age, $password);
            header("location:../view/listUser.php");
    } else {
        header("location:../view/createUser.php");
    }
}
?>
