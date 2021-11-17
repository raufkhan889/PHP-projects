<?php

include('user_class.php');

if (session_id() == '') {
    session_start();
}

if (isset($_SESSION['user_name']) && $_SESSION['logged_in'] == true) {
    header('location: home.php');
}

$account = $_GET['account'];
$name = $_GET['name'];
$email = $_GET['email'];
$pwd = $_GET['pwd'];
$country = $_GET['country'];

if ($account == null || $name == null || $email == null || $pwd == null || $country == null) {
    header("location: sign_up_client.php?msg=Input Field missing");
} else {
    $user = new Users;
    $user->connect_DB();
    $user->RegisterUser($account, $name, $email, $pwd, $country);
    $user->close_db();
}
