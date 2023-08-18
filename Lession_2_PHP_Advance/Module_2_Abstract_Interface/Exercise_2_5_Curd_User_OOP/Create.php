<?php


$usernameError = $emailError =  $phoneError = $ageError = $genderError = "";
$errors = [$usernameError, $emailError, $phoneError, $ageError, $genderError];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "Module_User.php";
    $user = new Module_User();
    if (empty($user->getUsername())) {
        $usernameError = "please enter username";
    } else
        $user->setUsername($_POST['username']);

    if (empty($_POST['email'])) {
        $emailError = "please enter email";
    } else
        $user->setEmail(($_POST['email']));

    if (empty($_POST['phone'])) {
        $phoneError = "please enter phone";
    } else
        $user->setPhone(($_POST['phone']));

    if (empty($_POST['age'])) {
        $ageError = "please enter age";
    } else
        $user->setAge($_POST['age']);

    if (empty($_POST['gender'])) {
        $genderError = "please enter gender";
    } else
        $user->setGender(($_POST['gender']));

    if (!empty($errors)) {
        $user->insert();
        echo "successfully";
    }
}
