<?php
include '../../controller/ProductController/ProductListController.php';
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
    <?php include '../header.php';?>
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
                    <a href="./ProductCreateView.php" alt="create product" class="text-white text-decoration-none">Create Product</a>
                </button>
            </div>

        </div>

        <!-- Table list User -->
        <div class="table_list-user">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($products != 0) {
                        foreach ($products as $product) {
                    ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['price']; ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td><?php echo $product['description']; ?></td>
                                <td>
                                    <!-- <a href="student-view.php?id=<?php echo $product['id']; ?>" class="btn btn-info btn-sm">View</a> -->
                                    <a href="ProductEditView.php?id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="../controller/ProductListController.php?id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<tbody class="position-relative">';
                        echo '<tr><th class="position-absolute" style="left:45%">No Record Found</th></tr>';
                        echo '</tbody>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script></script>
</body>

</html>