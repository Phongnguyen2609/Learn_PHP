<?php
include_once '../../controller/OrderController/OrderListController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Order</title>
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
                    <a href="./OrderCreateView.php" alt="create product" class="text-white text-decoration-none">Create Order</a>
                </button>
            </div>
        </div>

        <!-- Table list User -->
        <div class="table_list-user">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Shipping</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Created date</th>
                        <th scope="col">Completion Date</th>
                        <th scope="col">Note</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($orders != 0) {
                        foreach ($orders as $order) {
                    ?>
                            <tr>
                                <td><?php echo $order['id'] ?></td>
                                <td><?php echo $order['username'] ?></td>
                                <td><?php echo $order['name'] ?></td>
                                <td><?php echo $order['quantity'] ?></td>
                                <td><?php echo $order['total'] ?></td>
                                <td><?php echo $order['shipping_type']; ?></td>
                                <td><?php echo $order['payment_type']; ?></td>
                                <td><?php echo $order['created_date']; ?></td>
                                <td><?php echo $order['completion_time']; ?></td>
                                <td><?php echo $order['note']; ?></td>
                                <td>
                                    <a href="OrderEditView.php?id=<?php echo $order['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="../../controller/OrderController/OrderListController.php?id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');" alt="delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
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
            <!-- Tính tổng đơn hàng -->
            <div class="d-flex justify-content-evenly mt-5">
                <span class="fw-bold">Number of orders:
                    <?php
                        if($resultIndex == 0){
                            echo $resultIndex = 0;
                        } else {
                            echo $resultIndex;
                        }
                    ?>
                </span>
                <span class="fw-bold">Total Quantity Product: 
                <?php
                        if($resultQuantity == 0){
                            echo $resultQuantity = 0;
                        } else {
                            echo $resultQuantity;
                        }
                    ?>
                </span>
                <span class="fw-bold">Total Price Order: 
                    <?php  
                        if($resultTotalOrder == 0){
                            echo $resultTotalOrder = 0;
                        } else {
                            echo $resultTotalOrder;
                        }
                    ?>
                </span>
            </div>
        </div>
    </div>
</body>

</html>