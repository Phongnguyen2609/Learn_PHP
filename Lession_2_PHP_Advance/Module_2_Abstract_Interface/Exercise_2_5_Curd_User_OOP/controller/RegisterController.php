<?php
require "../model/User.php";
require '../dao/Crud.php';

$msg = "";
$username = $email = $phone = $age = $password = "";
$usernameError = $emailError = $phoneError = $ageError = $passwordError = "";
$errors = array();

$user = new User();
$crud = new Crud();
if (isset($_POST['submit'])) {
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $age = test_input($_POST['age']);
    $password = test_input($_POST['password']);

    if (empty($username)) {
        $errors['username'] = "please enter username";
    } else {
        $user->setUsername($username);
    }

    if (empty($email)) {
        $errors['email'] = "please enter email";
    } else {
        $user->setEmail($email);
    }

    if (empty($phone)) {
        $errors['phone'] = "please enter phone";
    } else {
        $user->setPhone($phone);
    }

    if (empty($age)) {
        $errors['age'] = "please enter age";
    } else {
        $user->setAge($age);
    }

    if (empty($password)) {
        $errors['password'] = "please enter password";
    } else {
        $user->setPassword($password);
    }

    if (count($errors) === 0) {

        $check = $crud->insert($user);
        if ($check) {
            $msg = "Register Successfully";
            header("location:../view/LoginView.php");
        } else {
            $msg = "Register Failed";
            header("location: ../view/CreateUser.php");
        }
    } else {
        include '../view/RegisterView.php';
    }

}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>