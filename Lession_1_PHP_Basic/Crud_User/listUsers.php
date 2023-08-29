<?php
require_once "connectDb.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="create_button">
            <button class="btn-button">
                <a href="createUser.php">create User</a>
            </button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users";
                $stmt = $conn->query($sql);

                // if ($stmt->execute()) {
                if ($stmt->num_rows > 1) {
                    foreach ($stmt as $user) {
                ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td>
                                <!-- <a href="student-view.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-sm">View</a> -->
                                <a href="editUser.php?id=<?php echo $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="deleteUser.php?id=<?php echo $user['id']; ?>" class="btn btn-success btn-sm">delete</a>
                                <!-- <form action="code.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete_student" value="<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                </form> -->
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<h5> No Record Found </h5>";
                }
                // }
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>