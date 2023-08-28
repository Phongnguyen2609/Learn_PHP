<?php
include_once '../../controller/OrderController/OrderEditController.php';
include_once '../../dao/OrderDao.php';
// $usernameValue = $emailValue = $phoneValue = $addressValue = "";
if (isset($_GET['id'])) {
    $orderDao = new OrderDao;

    $id = $_GET['id'];
    $result = $orderDao->detailOrder($id);


    foreach ($result as $item) {
        $id = $item['id'];

        $customerId = $item['customer_id'];
        $customerDetai = $orderDao->detailCustomer($customerId);
        foreach ($customerDetai as $customer) {
            $customerName = $customer['username'];
        }

        $productId = $item['product_id'];
        $productDetail = $orderDao->detailProduct($productId);
        foreach ($productDetail as $product) {
            $productName = $product['name'];
        }

        $quantity = $item['quantity'];
        $total = $item['total'];

        $shippingId = $item['shipping_id'];
        // $shippingDetail = $orderDao->detailShipping($shippingId);
        // foreach($shippingDetail as )
        // var_dump($shippingId);
        // die;
        $paymentId = $item['payment_id'];
        $completion_time = $item['completion_time'];
        $note = $item['note'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <?php include '../header.php'; ?>
</head>

<body>
    <div class="container">
        <div class="btn_create-user mt-5 w-50 m-auto border">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Order</h5>
                <button>
                    <a href="./OrderListView.php">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </button>
            </div>
            <!-- Form User -->
            <form method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value=<?php echo $id; ?>>

                    <!-- Customer -->
                    <div class="mb-2">
                        <label for="customer" class="form-label fw-bold">Customer:</label>
                        <select class="form-select" name="customer_id" aria-label="Default select example">
                            <option value="<?php echo $customerId; ?>" selected><?php echo $customerName; ?></option>
                            <?php
                            if ($customers != 0) {
                                foreach ($customers as $customer) {
                                    if ($customerId === $customer['id']) {
                            ?>
                                        <!-- disable -->
                                        <option class="text-black" value="<?php echo $customer['id'] ?>" disabled><?php echo $customer['username'] ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option class="text-black" value="<?php echo $customer['id'] ?>"><?php echo $customer['username'] ?></option>
                                    <?php
                                    }
                                    ?>
                            <?php
                                }
                            } else {
                                echo "customer not record";
                            }
                            ?>
                        </select>
                        <div class="text-danger">
                            <?php
                            if (isset($errors['customer_id'])) {
                                echo $errors['customer_id'];
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="mb-2">
                        <label for="product" class="form-label fw-bold">Product: </label>
                        <select class="form-select" name="product_id" aria-label="Default select example">
                            <option value="<?php echo $productId; ?>" selected><?php echo $productName; ?></option>
                            <?php
                            if ($products != 0) {
                                foreach ($products as $product) {
                            ?>
                                    <option class="text-black" value="<?php echo $product['id'] ?>"><?php echo $product['name'] ?></option>
                            <?php
                                }
                            } else {
                                echo "customer not record";
                            }
                            ?>
                        </select>
                        <div class="text-danger">
                            <?php
                            if (isset($errors['product_id'])) {
                                echo $errors['product_id'];
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-2">
                        <label for="quantity" class="form-label fw-bold">Quantity: </label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity" value="<?php echo $quantity; ?>" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['quantity'])) {
                                echo $errors['quantity'];
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Shipping -->
                    <div class="mb-2">
                        <label for="shipping" class="form-label fw-bold">Shiping: </label>
                        <div class="d-flex">
                            <?php
                            foreach ($shippings as $shipping) {
                            ?>
                                <div class="form-check ms-3">
                                    <!-- Nếu bằng nhau thì cho selected -->
                                    <?php
                                    if ($shippingId == $shipping['id']) {
                                    ?>
                                        <input class="form-check-input" name="shipping_id" type="radio" value="<?php echo $shipping['id'] ?>" checked>
                                        <label class="form-check-label" for="">
                                            <?php echo $shipping['shipping_type']; ?>
                                        </label>
                                    <?php
                                    } else {
                                    ?>
                                        <input class="form-check-input" name="shipping_id" type="radio" value="<?php echo $shipping['id'] ?>">
                                        <label class="form-check-label" for="">
                                            <?php echo $shipping['shipping_type']; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Payment -->
                    <div class="mb-2">
                        <label for="shipping" class="form-label fw-bold">Payment: </label>
                        <div class="d-flex">
                            <?php
                            foreach ($payments as $payment) {
                            ?>
                                <div class="form-check ms-3">
                                    <!-- Nếu bằng nhau thì cho selected -->
                                    <?php
                                    if ($paymentId == $payment['id']) {
                                    ?>
                                        <input class="form-check-input" name="payment_id" type="radio" value="<?php echo $payment['id'] ?>" checked>
                                        <label class="form-check-label" for="">
                                            <?php echo $payment['payment_type']; ?>
                                        </label>
                                    <?php
                                    } else {
                                    ?>
                                        <input class="form-check-input" name="payment_id" type="radio" value="<?php echo $payment['id'] ?>">
                                        <label class="form-check-label" for="">
                                            <?php echo $payment['payment_type']; ?>
                                        </label>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <!-- completion date -->
                    <div class="mb-2">
                        <label for="completion_date" class="form-label fw-bold">Completion Date: </label>
                        <input type="date" name="completion_time" class="form-control" id="completion_time" value="<?php echo $completion_time; ?>" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['completion_date'])) {
                                echo $errors['completion_date'];
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Note -->
                    <div class="mb-2">
                        <label for="note" class="form-label fw-bold">Note: </label>
                        <input type="text" name="note" class="form-control" id="note" placeholder="Enter Note" value="<?php echo $note; ?>" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['note'])) {
                                echo $errors['note'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                        Reset
                    </button>
                    <button type="submit" name="submitEditOrder" class="btn btn-primary">
                        submit
                    </button>
                </div>

            </form>

        </div>
    </div>
</body>

</html>