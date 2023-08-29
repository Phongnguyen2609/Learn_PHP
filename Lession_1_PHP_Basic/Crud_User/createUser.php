<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .error {
        color: red;
    }
</style>

<body>

    <?php
    // kết nối với db  
    require "connectDb.php";

    $username = $password = "";
    $usernameError = $passwordError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['username'])) {
            $usernameError = "name is required";
        } else {
            $username = test_input($_POST['username']);
        }

        if (empty($_POST['password'])) {
            $passwordError = "password is required";
        } else {
            $password = test_input($_POST['password']);
        }

        if (empty($usernameError) && empty($passwordError)) {

            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if ($stmt = $conn->prepare(($sql))) {
                $stmt->bind_param("ss", $username, $param_password);

                if ($stmt->execute()) {
                    header("location: listUsers.php");
                }
            }

            $stmt->close();
        }
        $conn->close();
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" id="username" placeholder="username"><br>
        <div class="error"><?php echo $usernameError; ?></div>
        <input type="password" style="margin-top: 10px;" name="password" id="password" placeholder="password"><br>
        <div class="error"><?php echo $passwordError; ?></div>
        <input type="submit" style="margin-top: 10px;" name="submit" value="submit">
        <!-- <p>Already have an account? <a href="login.php">login here</a>.</p> -->
    </form>
</body>

</html>