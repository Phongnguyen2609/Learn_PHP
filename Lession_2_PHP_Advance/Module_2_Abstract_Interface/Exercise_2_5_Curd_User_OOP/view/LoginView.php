<?php
require "../model/User.php";
require '../dao/Crud.php';
session_start();
$username = $password = $msg = "";
$usernameError = $emailError = $phoneError = $ageError = $passwordError = "";
$errors = [$usernameError, $emailError, $phoneError, $ageError, $passwordError];


$user = new User();
$crud = new Crud;
if (isset($_POST['login'])) {
    $username = test_input($_POST['username']);
$password = test_input($_POST['password']);

    if (empty($_POST['username'])) {
        $usernameError = "please enter username";
    } else {
        $user->setUsername($username);
    }

    if (empty($_POST['password'])) {
        $passwordError = "please enter password";
    } else {
        $user->setPassword($password);
    }

    if (empty($usernameError) && empty($passwordError)) {
        $check =  $crud->login($user);
        if($check) {
            $_SESSION['username'] = $username;
            header("location:../view/listUser.php");
        } else {
            $msg = "Register Failed";
            // header("location:../view/LoginView.php");
        }
        
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div class="container ">
    <div>
            <?php echo $msg; ?>
        </div>
        <!-- Create User -->
        <div class="btn_create-user mt-5 w-50 m-auto">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button>
                    <a href="./listUser.php">
                        <i class="fa-solid fa-xmark"></i>
                    </a>

                </button>
            </div>
            <!-- Form User -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- title -->

                <!-- Fields -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username:
                        </label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" />
                        <div class="text-danger">
                            <?php
                            echo $usernameError;
                            ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password:
                        </label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" />
                        <div class="text-danger">
                            <?php
                            echo $passwordError;
                            ?>
                        </div>
                    </div>
                </div>
                <!-- button -->
                <!-- <div class="modal-footer"> -->
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                    Reset
                </button>
                <button type="submit" name="login" class="btn btn-primary">
                    Save changes
                </button>
                <!-- </div> -->
                <div>
                    <a href="./createUser.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>