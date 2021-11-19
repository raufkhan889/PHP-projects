<?php

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        th {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <h1 class="text-center my-4">Dashboard</h1>
        <div class="shadow-lg p-4">

            <ul class="list-group">
                <li class="list-group-item fs-3 m-2">
                    Manage Users
                    <a class="btn btn-secondary px-5 float-end" href="display_all_users.php">GO </a>
                </li>

                <li class="list-group-item fs-3 m-2">
                    Manage Products
                    <a class="btn btn-secondary px-5 float-end" href="manage_products.php">GO </a>
                </li>

                <li class="list-group-item fs-3 m-2">
                    Manage Categories
                    <a class="btn btn-secondary px-5 float-end" href="manage_categories.php">GO </a>
                </li>

            </ul>

        </div>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>