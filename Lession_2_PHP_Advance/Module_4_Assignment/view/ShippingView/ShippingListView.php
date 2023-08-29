<?php
include '../../controller/ShippingController/ShippingListController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
    <?php include '../header.php'; ?>
</head>

<body>
    <div class="container">

        <!-- Create User -->
        <div class="mt-5">
            <div class="btn_create-user">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary">
                    <span>
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <a href="./ShippingCreateView.php" alt="create product" class="text-white text-decoration-none">Create Shipping</a>
                </button>

            </div>

            <!-- Table list User -->
            <div class="table_list-user">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Shipping Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($shippings != 0) {
                            foreach ($shippings as $shipping) {
                        ?>
                                <tr>
                                    <td><?php echo $shipping['id']; ?></td>
                                    <td><?php echo $shipping['shipping_type']; ?></td>
                                    <td>
                                        <!-- <a href="student-view.php?id=<?php echo $shipping['id']; ?>" class="btn btn-info btn-sm">View</a> -->
                                        <a href="ShippingEditView.php?id=<?php echo $shipping['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="../../controller/ShippingController/ShippingListController.php?id=<?php echo $shipping['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash"></i></a>
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
</body>

</html>