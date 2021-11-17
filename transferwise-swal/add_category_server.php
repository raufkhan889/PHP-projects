<?php

include('category_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$new_cat = '';
if (!empty($_GET['new_cat'])) {
    $new_cat = $_GET['new_cat'];
}
// echo $name;

if ($cat = null) {
    header('location: manage_categories.php?missing field!');
} else {
    // echo $name;
    $category = new Category;
    $category->connect_DB();
    $category->addCategoryName($new_cat);
    $category->close_db();
}
