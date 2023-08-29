<?php
include '../../controller/CustomerController/CustomerListController.php';
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
    <?php include '../header.php'; ?>
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
                    <a href="./CustomerCreateView.php" alt="create user" class="text-white text-decoration-none">Create Customer</a>
                </button>
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
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($customers as $customer) {
                    ?>
                        <tr>
                            <td><?php echo $customer['id']; ?></td>
                            <td><?php echo $customer['username']; ?></td>
                            <td><?php echo $customer['email']; ?></td>
                            <td><?php echo $customer['phone']; ?></td>
                            <td><?php echo $customer['address']; ?></td>
                            <td>
                                <!-- <a href="student-view.php?id=<?php echo $customer['id']; ?>" class="btn btn-info btn-sm">View</a> -->
                                <a href="CustomerEditView.php?id=<?php echo $customer['id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="../controller/CustomerListController.php?id=<?php echo $customer['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script></script>
</body>

</html>