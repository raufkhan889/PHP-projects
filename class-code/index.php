<?php

include('product_class.php');

$product = new Product;
$product->connectDB();
$products = $product->getAllProduct();
$product->close_DB();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center"> All Products</h1>

        <div class="d-flex justify-content-between">
            <a href="add_product.php" class="btn btn-outline-primary  ">Add Product</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>

        <div class="d-flex my-3">
            <div class="fw-bold" style="flex: 1;">Image</div>
            <div class="fw-bold" style="flex: 1;">Title</div>
            <div class="fw-bold" style="flex: 1;">Price</div>
            <div class="fw-bold" style="flex: 1;">Stock</div>
            <div class="fw-bold" style="flex: 1;">Actions</div>
        </div>

        <?php
        foreach ($products as $product) {
            echo "
            <div class='d-flex my-3'>
            <div style='flex: 1;'><img src='./uploads/" . $product['image'] . "' width='80px'></div>
            <div style='flex: 1;'>" . $product['title'] . "</div>
            <div style='flex: 1;'>$" . $product['price'] . "</div>
            <div style='flex: 1;'>" . $product['stock'] . "x</div>
            <div style='flex: 1;'>
                <a href='show_product.php?id=" . $product['id'] . "' class='btn btn-primary'>show</a>
                <a href='' class='btn btn-success'>Edit</a>
                <a href='' class='btn btn-danger'>Delete</a>
            </div>
            </div>    
            
            ";
        }


        ?>



    </div>
</body>

</html>