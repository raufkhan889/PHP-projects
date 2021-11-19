<?php

include('product_class.php');

$search = "";
if (!empty($_GET['search']))
    $search = $_GET['search'];

$product = new Product;
$product->connect_DB();
$results = $product->searchProductByName($search);
$product->close_db();

?>


<?php include('header.php') ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">

        <h1 class="text-center my-4">Search Results</h1>

        <div class="d-flex justify-content-between">

            <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-outline-secondary">Back &larr;</a>

            <form action="search_product.php" method="GET" class="d-flex">
                <input class="form-control me-2" name="search" type="search" placeholder="Search Product" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>

        </div>

        <div class="row">
            <?php
            if (!$results) {
                echo '<div class="alert alert-danger my-4">No Results Found, try something else! </div>';
            } else {
                foreach ($results as $product) {
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
                                </a>
                            </div>
                        </div>
                    </div>
                ";
                }
            }
            ?>
            <!-- end of single grid-post  -->

        </div>
        <!-- end of row  -->
    </div>


    <?php include('footer.php') ?>
</body>

</html>