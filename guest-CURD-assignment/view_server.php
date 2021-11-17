<?php

include('guest_class.php');

$users = new GuestUser;
$users->connect_DB();
$data = $users->viewGuests();
$users->close_db();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All | Guests</title>
    <style>
        td,
        th {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>All Guest Users <a href="guest_client.php">View Form</a> </h1>

        <table border="4">
            <?php
            echo "
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Skills</th>
            <th>Post</th>
            <th>Resume Text</th>
            <th>Email confirmation</th>
            <th>Terms and condition</th>
            </tr>";
            foreach ($data as $user) {
                echo "
            <tr>
                <td>" . $user['id'] . "</td>
                <td>" . $user['name'] . "</td>
                <td>" . $user['email'] . "</td>
                <td>" . $user['gender'] . "</td>
                <td>" . $user['nationality'] . "</td>
                <td>" . $user['skills'] . "</td>
                <td>" . $user['post'] . "</td>
                <td>" . $user['textarea'] . "</td>
                <td>" . $user['vemail'] . "</td>
                <td>" . $user['terms'] . "</td>
            </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>