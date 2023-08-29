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

    if (isset($_POST['submit'])) {
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

            $sql = "UPDATE users set username = '$username', password = '$password' WHERE id = '$userId' ";

            // $param_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->query(($sql));
            // $stmt->bind_param("ss", $username, $password, $userId);

            if ($stmt == true) {
                header("location: listUsers.php");
            }
        }
    }


    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id='$user_id'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $username = $row['username'];
                $password = $row['password'];
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="user_id" id="user_id"><br>
        <input type="text" name="username" id="username" placeholder="username" value="<?php echo $username ?>"><br>
        <div class="error"><?php echo $usernameError; ?></div>
        <input type="password" style="margin-top: 10px;" name="password" id="password" placeholder="password" value="<?php echo $password ?>"><br>
        <div class="error"><?php echo $passwordError; ?></div>
        <input type="submit" style="margin-top: 10px;" name="submit" value="submit">
        <!-- <p>Already have an account? <a href="login.php">login here</a>.</p> -->
    </form>
</body>

</html>