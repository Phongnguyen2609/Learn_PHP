<?php
include_once '../../controller/OrderController/OrderCreateController.php';
// khi inclue 2 file controller thì nó sẽ báo là connect không thể được khai báo , bởi vì Connect đã được sủ dụng
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
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

                    <!-- Customer -->
                    <div class="mb-2">
                        <label for="customer" class="form-label fw-bold">Customer:</label>
                        <select class="form-select" name="customer_id" aria-label="Default select example">
                            <option value="">please choose customer </option>
                            <?php
                            if ($customers != 0) {
                                foreach ($customers as $customer) {
                            ?>
                                    <option class="text-black" value="<?php echo $customer['id'] ?>"><?php echo $customer['username'] ?></option>
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
                            <option value="">please choose product </option>
                            <?php
                            if ($products != 0) {
                                foreach ($products as $product) {
                                    if ($product['quantity'] === 0) {
                            ?>
                                        <option class="text-black" value="<?php echo $product['id'] ?>" disabled><?php echo $product['name'] ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option class="text-black" value="<?php echo $product['id'] ?>"><?php echo $product['name'] ?></option>
                            <?php
                                    }
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
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity" />
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
                                    <input class="form-check-input" name="shipping_id" type="radio" value="<?php echo $shipping['id'] ?>">
                                    <label class="form-check-label" for="">
                                        <?php echo $shipping['shipping_type']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="text-danger">
                            <?php
                            if (isset($errors['shipping_id'])) {
                                echo $errors['shipping_id'];
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
                                    <input class="form-check-input" name="payment_id" type="radio" value="<?php echo $payment['id'] ?>">
                                    <label class="form-check-label" for="">
                                        <?php echo $payment['payment_type']; ?>
                                    </label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="text-danger">
                            <?php
                            if (isset($errors['payment_id'])) {
                                echo $errors['payment_id'];
                            }
                            ?>
                        </div>
                    </div>

                    <!-- completion date -->
                    <div class="mb-2">
                        <label for="completion_time" class="form-label fw-bold">Completion Date: </label>
                        <input type="date" name="completion_time" class="form-control" id="completion_time" placeholder="Enter Password" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['completion_time'])) {
                                echo $errors['completion_time'];
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Note -->
                    <div class="mb-2">
                        <label for="note" class="form-label fw-bold">Note: </label>
                        <input type="text" name="note" class="form-control" id="note" placeholder="Enter Note" />
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
                    <button type="submit" name="submitOrder" class="btn btn-primary">
                        submit
                    </button>
                </div>

            </form>

        </div>
    </div>
</body>

</html>