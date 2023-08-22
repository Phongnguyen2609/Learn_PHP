<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
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
            <form action="../controller/RegisterController.php" method="post">
                <!-- title -->

                <!-- Fields -->
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username:
                        </label>
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Enter Username" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['username'])) {
                                echo $errors['username'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email: </label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter Email" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['email'])) {
                                echo $errors['email'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mb-3">
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

                    <div class="mb-3">
                        <label for="age" class="form-label fw-bold">Age: </label>
                        <input type="text" name="age" class="form-control" id="age" placeholder="Enter Age" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['age'])) {
                                echo $errors['age'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password:
                        </label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter Password" />
                        <div class="text-danger">
                            <?php
                            if (isset($errors['password'])) {
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
                <button type="submit" name="submit" class="btn btn-primary">
                    Save changes
                </button>
                <!-- </div> -->
            </form>
            <div>
                <a href="LoginView.php">login</a>
            </div>
        </div>
    </div>
</body>

</html>