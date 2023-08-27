<?php
include_once '../../controller/OrderController/OrderListController.php';
include_once '../../dao/OrderDao.php';
$orderDao = new OrderDao;
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
                    <a href="./OrderCreateView.php" alt="create product" class="text-white text-decoration-none">Create Order</a>
                </button>
            </div>

            <!-- <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div> -->

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
                            // var_dump($order); die;

                    ?>
                            <tr>
                                <td><?php echo $order['id'] ?></td>
                                <?php
                                $customerDetai = $orderDao->detailCustomer($order['customer_id']);
                                foreach ($customerDetai as $customer) {
                                    $customerName = $customer['username'];
                                ?>
                                    <td><?php echo $customerName; ?></td>
                                <?php
                                }
                                ?>

                                <?php
                                $productDetail = $orderDao->detailProduct($order['product_id']);
                                foreach ($productDetail as $product) {
                                    $productName = $product['name'];
                                ?>
                                    <td><?php echo $productName; ?></td>
                                <?php
                                }
                                ?>
                                <!-- 
                                <td><?php echo $order['username'] ?></td>
                                <td><?php echo $order['name'] ?></td> -->
                                <td><?php echo $order['quantity'] ?></td>
                                <td><?php echo $order['shipping']; ?></td>
                                <td><?php echo $order['payment']; ?></td>
                                <td><?php echo $order['created_date']; ?></td>
                                <td><?php echo $order['completion_time']; ?></td>
                                <td><?php echo $order['note']; ?></td>
                                <td>
                                    <!-- <a href="student-view.php?id=<?php echo $order['id']; ?>" class="btn btn-info btn-sm">View</a> -->
                                    <a href="OrderEditView.php?id=<?php echo $order['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="../../controller/OrderController/OrderListController.php?id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo '<tbody class="position-relative">';
                        // echo '<tr class="d-flex "><th class="">No Record Found</th></tr>';
                        echo '<tr><th class="position-absolute" style="left:50%">No Record Found</th></tr>';
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