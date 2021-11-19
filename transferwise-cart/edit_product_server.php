<?php

include('product_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$id = '';
$image = '';
$title = '';
$description = '';
$price = '';
$stock_count = '';
$category_id = '';

if (!empty($_POST['p_id']))
    $id = $_POST['p_id'];

if (!empty($_FILES['p_image']))
    $image = $_FILES['p_image']['name'];

if (!empty($_POST['p_title']))
    $title = $_POST['p_title'];

if (!empty($_POST['p_description']))
    $description = $_POST['p_description'];

if (!empty($_POST['p_price']))
    $price = $_POST['p_price'];

if (!empty($_POST['p_stock_qty']))
    $stock_count = $_POST['p_stock_qty'];

if (!empty($_POST['category']))
    $category_id = $_POST['category'];

if ($title == null || $description == null || $price == null || $stock_count == null || $category_id == null) {
    header("location: edit_product_client.php?msg=Required fields are missing!");
} else {
    $img_path = move_uploaded_file(
        $_FILES['p_image']['tmp_name'],
        'uploads/' . $_FILES['p_image']['name']
    );

    $product = new Product;
    $product->connect_DB();
    $product->updateProduct($id, $image, $title, $description, $price, $stock_count, $category_id);
    $product->close_db();
}
