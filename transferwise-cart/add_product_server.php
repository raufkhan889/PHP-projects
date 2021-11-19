<?php

include("product_class.php");

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$image = $_FILES['p_image']['name'];
$title = $_POST['p_title'];
$description = $_POST['p_description'];
$price = $_POST['p_price'];
$stock_count = $_POST['p_stock_qty'];
$category_id = $_POST['category'];

if ($image == null || $title == null || $description == null || $price == null || $stock_count == null || $category_id == null) {
    header("location: add_product_client.php?msg=Required fields are missing!");
} else {

    $img_path = move_uploaded_file(
        $_FILES['p_image']['tmp_name'],
        'uploads/' . $_FILES['p_image']['name']
    );

    $product = new Product;
    $product->connect_DB();
    $product->addProduct($image, $title, $description, $price, $stock_count, $category_id);
    $product->close_db();
}
