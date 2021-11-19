<?php

if (session_id() == "") {
    session_start();
}

if (isset($_REQUEST['add_cart_btn'])) {

    if (isset($_SESSION['cart'])) {

        $cart_session_id = array_column($_SESSION['cart'], 'id');

        if (!in_array($_REQUEST['p_id'], $cart_session_id)) {

            $cart_session = array(
                'id' => $_REQUEST['p_id'],
                'name' => $_REQUEST['p_name'],
                'price' => $_REQUEST['p_price'],
                'quantity' => $_REQUEST['p_qty']
            );

            $_SESSION['cart'][] = $cart_session;

            header("location: view_products.php?msg=cart updated!");
        } else {
            header("location: view_products.php?msg=Already in the cart!");
        }
    } else {

        $cart_session = array(
            'id' => $_REQUEST['p_id'],
            'name' => $_REQUEST['p_name'],
            'price' => $_REQUEST['p_price'],
            'quantity' => $_REQUEST['p_qty']
        );

        $_SESSION['cart'][] = $cart_session;

        header("location: view_products.php?msg=Product added to cart!");
    }
}
