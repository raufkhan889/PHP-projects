<?php

if (session_id() == "") {
    session_start();
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'remove') {

        foreach ($_SESSION['cart'] as $key => $value) {

            if ($_GET['cart_id'] == $value['id']) {

                unset($_SESSION['cart'][$key]);

                header("location: show_cart.php?msg=Item Successfully Removed!");
            }
        }
    }
}

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'add') {

        foreach ($_SESSION['cart'] as $key => $value) {

            if ($_POST['id'] == $value['id']) {

                $_SESSION['cart'][$key]['quantity'] += 1;
            }
        }
    }
}

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'drop') {

        foreach ($_SESSION['cart'] as $key => $value) {

            if ($_POST['id'] == $value['id']) {

                if ($_SESSION['cart'][$key]['quantity'] > 1) {
                    $_SESSION['cart'][$key]['quantity'] -= 1;
                }
            }
        }
    }
}
