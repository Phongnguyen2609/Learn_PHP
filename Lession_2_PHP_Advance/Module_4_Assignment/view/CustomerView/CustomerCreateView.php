<?php
    include_once '../../controller/CustomerController/CustomerCreateUpdateController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create new Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <?php include '../header.php';?>

</head>

<body>
    <div class="container ">
        <!-- Create User -->
        <div class="btn_create-user mt-5 w-50 m-auto border">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
                <button>
                    <a href="./CustomerListView.php">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </button>
            </div>
            <!-- Form User -->
            <form method="post">
                <!-- title -->

                <!-- Fields -->
                <div class="modal-body">
                    <input type="hidden" name="id">

                    <div class="mb-2">
                        <label for="username" class="form-label fw-bold">Username:
                        </label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['username'])) {
                                echo $errors['username'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label fw-bold">Email: </label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['email'])) {
                                echo $errors['email'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="phone" class="form-label fw-bold">Phone: </label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['phone'])) {
                                echo $errors['phone'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="address" class="form-label fw-bold">Address: </label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['address'])) {
                                echo $errors['address'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                        Reset
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        submit
                    </button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>