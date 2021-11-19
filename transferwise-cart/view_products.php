<?php

include('product_class.php');

$product = new Product;
$product->connect_DB();
$all_Products = $product->getAllProducts();
$product->close_db();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .cropped {
            width: 100%;
            height: 175px;
            overflow: hidden;
        }
    </style>
</head>

</style>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">

        <h1 class="text-center my-4">All Products</h1>

        <div class="d-flex justify-content-end">
            <form action="search_product.php" method="GET" class="d-flex">
                <input class="form-control me-2" name="search" type="search" placeholder="Search Product" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
        </div>

        <div class="row">
            <?php
            foreach ($all_Products as $product) {
                echo "
                    <div class='col-lg-3 col-md-4 col-sm-6 col-xm-6 my-3'>
                        <div class='card shadow'>
                            <div class='cropped'>
                                <img src='./uploads/" . $product['picture'] . "'class='img-thumbnail'>
                            </div>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $product['title'] . "</h5>
                                <p class='card-text' style='height:50px; overflow-y:hidden;'>
                                    " . $product['description'] . "
                                </p>
                                <div class='mb-2 fs-5'>Price: <b>$" . $product['price'] .  "</b></div>
                                <div class='mb-2 text-muted fst-italic'>Stock Left - " . $product['stock'] . "</div>
                                <a href='show_product.php?id=" . $product['pID'] . "' class='btn btn-success'>
                                    View Product
                                </a>";
                if (isset($_SESSION['user_name']) && $_SESSION['logged_in'] == true) {
                    echo "<form action='add_cart_server.php' method='GET' class='d-inline'>
                                        <input type='hidden' name='p_id' value='" . $product['pID'] . "'>
                                        <input type='hidden' name='p_name' value='" . $product['title'] . "'>
                                        <input type='hidden' name='p_qty' value='1'>
                                        <input type='hidden' name='p_price' value='" . $product['price'] .  "'>
                                        <input type='submit' value='Add Cart' name='add_cart_btn' class='btn btn-warning float-end'>
                                    </form>";
                }
                echo "
                            </div>
                        </div>
                    </div>
                ";
            }
            ?>

        </div>
        <!-- end of row  -->
    </div>

    <?php include('footer.php'); ?>

</body>

</html>