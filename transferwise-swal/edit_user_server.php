<?php

include('user_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$id = $_POST['u_id'];
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$country = $_POST['country'];

if ($id == null || $name == null || $pwd == null || $country == null) {
    header("location: edit_user_client.php?msg=Fields are missing");
} else {
    $user = new Users;
    $user->connect_DB();
    $user->UpdateUser($id, $name, $pwd, $country);
    $user->close_db();
}
