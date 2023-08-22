<?php
    include '../controller/HomeController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <!-- Create User -->
        <div class="d-flex justify-content-between mt-5">
            <div class="btn_create-user">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary">
                    <span>
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <a href="./RegisterView.php" alt="create user" class="text-white text-decoration-none">Create User</a>
                </button>
            </div>

            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div>

        <!-- Table list User -->
        <div class="table_list-user">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Age</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($check as $user) {
                    ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['phone']; ?></td>
                            <td><?php echo $user['age']; ?></td>
                            <td>
                                <!-- <a href="student-view.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-sm">View</a> -->
                                <a href="#" class="btn btn-success btn-sm">Edit</a>
                                <a href="#" class="btn btn-success btn-sm">delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>