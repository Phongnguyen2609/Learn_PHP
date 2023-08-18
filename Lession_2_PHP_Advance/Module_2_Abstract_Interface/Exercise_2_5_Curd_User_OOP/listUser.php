<?php
    require_once "Create.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <!-- Create User -->
        <div class="btn_create-user mt-5">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <span>
                    <i class="fa-solid fa-plus"></i>
                </span>
                Create User
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Form User -->
                        <form action="Create.php" method="post">
                            <!-- title -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Fields -->
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="username" class="form-label fw-bold">Username: </label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                                    <div class="text-danger"><?php echo $usernameError; ?></div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">Email: </label>
                                    <input type="email" name="email"class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                    <div class="text-danger"><?php echo $emailError; ?></div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label fw-bold">Phone: </label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label fw-bold">Age: </label>
                                    <input type="number" name="age" class="form-control" id="age" placeholder="Enter Age">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label fw-bold">Gender: </label>
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female">
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check ms-2">
                                            <input class="form-check-input" type="radio" name="gender" id="male">
                                            <label class="form-check-label" for="male">
                                               Male
                                            </label>
                                        </div>
                                        <div class="form-check ms-2">
                                            <input class="form-check-input" type="radio" name="gender" id="orther">
                                            <label class="form-check-label" for="orther">
                                               Orther
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- button -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Table list User -->
        <div class="table_list-user">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>