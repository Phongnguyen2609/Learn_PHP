<?php
include_once '../../controller/ShippingController/ShippingCreateController.php';
// khi inclue 2 file controller thì nó sẽ báo là connect không thể được khai báo , bởi vì Connect đã được sủ dụng

if (isset($_GET['id'])) {
    $shippingDao = new ShippingDao;

    $id = $_GET['id'];
    $result = $shippingDao->detailShipping($id);


    foreach ($result as $item) {
        $id = $item['id'];
        $shippingType = $item['shipping_type'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Shipping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <?php include '../header.php';?>
</head>

<body>
    <div class="container">
        <div class="btn_create-user mt-5 w-50 m-auto border">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Shipping</h5>
                <button>
                    <a href="./ShippingListView.php">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </button>
            </div>
            <!-- Form User -->
            <form method="post">
                <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                    <!-- delivery address -->
                    <div class="mb-2">
                        <label for="delivery_address" class="form-label fw-bold">Shipping: </label>
                        <input type="text" name="shipping_type" class="form-control" id="shipping_type" placeholder="Enter Shipping Type" value="<?php echo $shippingType ?>"/>
                        <div class="text-danger">
                            <?php
                            if (isset($errors['shipping_type'])) {
                                echo $errors['shipping_type'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form_footer mb-3 ms-3">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                        Reset
                    </button>
                    <button type="submit" name="submitShipping" class="btn btn-primary">
                        submit
                    </button>
                </div>

            </form>

        </div>
    </div>
</body>

</html>