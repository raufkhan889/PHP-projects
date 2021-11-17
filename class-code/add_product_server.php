<?php

include('product_class.php');

$image = $_FILES['image']['name'];
$title = $_REQUEST['title'];
$description = $_REQUEST['description'];
$price = $_REQUEST['price'];
$stock = $_REQUEST['stock'];

if ($image == null || $title == null) {
    header('location: add_product.php?msg=error!');
} else {
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $_FILES['image']['name']);

    $product = new Product;
    $product->connectDB();
    $product->addProduct($image, $title, $description, $price, $stock);
    $product->close_DB();
}
