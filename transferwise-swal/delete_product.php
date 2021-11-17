<?php

include("product_class.php");

// if (session_id() == '') {
//     session_start();
// }

// if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
//     header('location: login_client.php?msg=Login First!');
// }


if (isset($_POST['is_del_set'])) {
    $product_id = $_POST['product_id'];

    $product = new Product;
    $product->connect_DB();
    $product->removeProduct($product_id);
    $product->close_db();
}








// if ($_POST['is_del_set'] == true) {
//     $id = $_POST['product_id'];

//     $product = new Product;
//     $product->connect_DB();

//     $p = $product->getProductByID($id);
//     $image = $p['picture'];

//     unlink('uploads/' . $image);

//     $product->removeProduct($id);
//     $product->close_db();
// }
