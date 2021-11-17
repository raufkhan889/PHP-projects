<?php

include('user_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$users = new Users;
$users->connect_DB();
$data = $users->getAllUsers();
$users->close_db();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display All Users</title>
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
        <a href="dashboard.php" class="btn btn-outline-secondary float-start">Go Back &larr;</a>
        <h1 class="text-center my-4">Manage Users</h1>

        <div class="shadow-lg p-4">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Account</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Country</th>
                    <th class="text-center">Operations</th>
                </tr>
                <?php
                foreach ($data as $user) {
                    echo " 
                    <tr>

                        <td class='fw-bold'>" . $user['id'] . "</td>
                        <td>" . $user['account'] . "</td>
                        <td>" . $user['name'] . "</td>
                        <td>" . $user['email'] . "</td>
                        <td>" . $user['password'] . "</td>
                        <td>" . $user['country'] . "</td>
                        <td class='d-flex justify-content-around'> 
                            <a href='edit_user_client.php?id=" . $user['id'] . "' class='btn btn-success'> Edit </a>
                            <a href='del_user_server.php?id=" . $user['id'] . "' class='btn btn-danger'> Delete </a> 
                        </td>
                    
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>