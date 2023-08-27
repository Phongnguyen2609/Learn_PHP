<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create new Product</title>
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
            <form action="../../controller/ProductController/ProductCreateController.php" method="post" enctype="multipart/form-data">
                <!-- title -->

                <!-- Fields -->
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name:
                        </label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name" />
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
                        <input type="file" name="fileUpload" class="form-control" id="fileUpload" />
                        <!-- <div class="text-danger">
                            <?php
                            if (isset($errors['image'])) {
                                echo $errors['image'];
                            }
                            ?>
                        </div> -->
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Price: </label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Enter Phone" />
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
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity" />
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
                        <input type="text" name="description" class="form-control" id="description" placeholder="Enter Description" />
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
        </div>
    </div>
</body>

</html>