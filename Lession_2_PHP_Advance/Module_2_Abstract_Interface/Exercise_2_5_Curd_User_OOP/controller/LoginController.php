<?php
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

    if (empty($password)) {
        $errors['password'] = "please enter password";
    } else {
        $user->setPassword($password);
    }

    if (count($errors) === 0) {
        $check =  $crud->login($user);
        if($check) {
            $_SESSION['username'] = $username;
            header("location:../view/listUser.php");
        } else {
            $msg = "Register Failed";
            // header("location:../view/LoginView.php");
        }
        
    } else {
        include '../view/LoginView.php';
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
