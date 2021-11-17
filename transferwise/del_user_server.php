<?php

include('user_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
} else {

    $id = $_GET['id'];

    $user = new Users;
    $user->connect_DB();
    $user->deleteUser($id);
    $user->close_db();
}
