
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
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
                <button>
                    <a href="./listUser.php">
                        <i class="fa-solid fa-xmark"></i>
                    </a>

                </button>
            </div>
            <!-- Form User -->
            <form action="../controller/LoginController.php" method="post">
                <!-- title -->

                <!-- Fields -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username:
                        </label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" />
                        <div class="text-danger">
                            <?php 
                                if(isset($errors['username'])) {
                                    echo $errors['username'];
                                }
                            ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password:
                        </label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" />
                        <div class="text-danger">
                            <?php 
                                if(isset($errors['password'])) {
                                    echo $errors['password'];
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
                <button type="submit" name="login" class="btn btn-primary">
                    Save changes
                </button>
                <!-- </div> -->
                <div>
                    <a href="./RegisterView.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>