<?php

include("user_class.php");

if (session_id() == '') {
    session_start();
}

if (isset($_SESSION['user_name']) && $_SESSION['logged_in'] == true) {
    header('location: home.php');
}

$email = $_GET['email'];
$pwd = $_GET['pwd'];

if ($email == null || $pwd == null) {
    header("location: login_client.php?msg=Input fields are missing!");
} else {
    $user = new Users;
    $user->connect_DB();
    $user->LoginUser($email, $pwd);
    $user->close_db();
}
