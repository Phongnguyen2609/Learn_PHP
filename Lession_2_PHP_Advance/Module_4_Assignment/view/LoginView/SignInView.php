<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>
<body>
<div class="container ">
        <!-- Create User -->
        <div class="btn_create-user mt-5 w-50 m-auto border">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <!-- <button>
                    <a href="./CustomerListView.php">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </button> -->
            </div>
            <form action="../../controller/LoginController/SignInController.php" method="post">
                <div class="modal-body">

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
                        <label for="password" class="form-label fw-bold">Password: </label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['password'])) {
                                echo $errors['password'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form_footer mb-3 ms-3">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                        Reset
                    </button>
                    <button type="submit" name="SignIn" class="btn btn-primary">
                        submit
                    </button>
                </div>
            </form>
            <!-- link sang register -->

        </div>
    </div>
</body>
</html>