<?php
include '../../dao/ProductDao.php';
// $usernameValue = $emailValue = $phoneValue = $addressValue = "";
if (isset($_GET['id'])) {
    $productDao = new ProductDao;

    $id = $_GET['id'];
    $result = $productDao->detailProduct($id);


    foreach ($result as $item) {
        $id = $item['id'];
        $name = $item['name'];
        $image = $item['fileUpload'];
        $price = $item['price'];
        $quantity = $item['quantity'];
        $description = $item['description'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div class="container ">
        <!-- Create User -->
        <div class="btn_create-user mt-5 w-50 m-auto">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <!-- Sửa -->
                <button>
                    <a href="./ProductListView.php">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </button>
            </div>
            <!-- Form User -->
            <form action="../../controller/ProductControoler/ProductEditController.php" method="post" enctype="multipart/form-data">
                <!-- title -->

                <!-- Fields -->
                <div class="modal-body">
                <input type="hidden" name="id" value=<?php echo $id; ?> >

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name:
                        </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name" value="<?php echo $name ?>" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['name'])) {
                                echo $errors['name'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="fileUpload" class="form-label fw-bold">Image: </label>
                        <input type="file" name="fileUpload" class="form-control" id="fileUpload" value="<?php echo $image ?>" />
                        <!-- <div class="text-danger">
                            <?php
                            if (isset($errors['fileUpload'])) {
                                echo $errors['fileUpload'];
                            }
                            ?>
                        </div> -->
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Price: </label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price" value="<?php echo $price ?>" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['price'])) {
                                echo $errors['price'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label fw-bold">Quantity: </label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity" value="<?php echo $quantity ?>" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['quantity'])) {
                                echo $errors['quantity'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description: </label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Enter Description" value="<?php echo $description ?>" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['description'])) {
                                echo $errors['description'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- button -->
                <!-- <div class="modal-footer"> -->
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                    Reset
                </button>
                <button type="submit" name="submit" class="btn btn-primary">
                    submit
                </button>
                <!-- </div> -->
            </form>
            <!-- <div>
                <a href="LoginView.php">login</a>
            </div> -->
        </div>
    </div>
</body>

</html>