<?php

session_start();

if (isset($_SESSION['pseudo'])) {
    // echo '<h3>WELCOME ' . $_SESSION['pseudo'] . '</h3>';
    echo '<br><br> <a href = "index.php">Logout </a>';
} else {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="connect.php" method="POST" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New contact</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="cname" placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="number" class="form-control" id="mobile" placeholder="Enter mobile" required>
                    </div>
                    <div class="mb-3">
                        <label for="adress" class="form-label">Adress</label>
                        <input type="text" class="form-control" id="adress" placeholder="Enter adress" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-dismiss="modal">Save</button> -->
                    <button type="submit" id="save" class="btn btn-dark" data-bs-dismiss="modal" data-bs-toggle="modal">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                    <!-- <button type=" button" class="btn btn-dark" id="cancel" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button> -->
                </div>
            </form>
        </div>
    </div>

    <div class="container my-3">
        <h1 class="text-center">
            GESTIONNAIRE DE CONTACT <br>
            <h3 class="text-center">WELCOME <?php $_SESSION['pseudo'] ?> <a href="index.php">Logout </a></h3>

        </h1> <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#completeModal">
            Add New contact
        </button>

        <table class="table table-dark table-hover my-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody id="listcontact">
                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td id="btns">
                        <button type="button" id="edit-contact" class="btn btn-outline-success">Edit</button>
                        <button type="button" id="delete-contact" class="btn btn-outline-danger">Delete</button>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>


    <script src="dist/js/jquery-3.6.0.min.js"></script>
    <script src="dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>

</html>