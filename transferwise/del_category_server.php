<?php

include('category_class.php');

if (session_id() == "") {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$cID = "";

if (!empty($_GET['cID'])) {
    $cID = $_GET['cID'];
}

$category = new Category;
$category->connect_DB();
$category->deleteCategory($cID);
$category->close_db();
