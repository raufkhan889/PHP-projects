<?php

include('product_class.php');

$cat = '';
if (!empty($_GET['cat'])) {
    $cat = $_GET['cat'];
}

$a_product = new Product;
$a_product->connect_DB();
$cat_products = $a_product->getProductByCategory($cat);
$a_product->close_db();


?>

<?php include('header.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="row">
            <?php
            if ($cat_products == NULL || $cat == "" || $cat == 'error') {
                echo '<div class="alert alert-danger my-4">No Category Found</div>';
            } else {
                echo '<h1 class="text-center my-4"> Category </h1>';

                foreach ($cat_products as $product) {
                    echo '
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xm-6 my-3">
                        <div class="card shadow">
                            <div class="cropped" style="width: 100%; height: 175px; overflow: hidden;">
                                <img src="uploads/' . $product['picture'] . '" width="100%">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"> ' . $product['title'] . ' </h5>
                                <p class="card-text" style="height:50px; overflow-y:hidden;">
                                    ' . $product['description'] . '
                                </p>
                                <div class="mb-2 fs-5">Price: <b>$' . $product['price'] . '</b></div>
                                <div class="mb-2 text-muted fst-italic">Stock Left - ' . $product['stock'] . '</div>
                                <a href="show_product.php?id=' . $product['pID'] . '" class="btn btn-success">
                                    View Product
                                </a>
                            </div>
                        </div>
                    </div>
                ';
                }
            }

            ?>


        </div>
    </div>


    <?php include('footer.php'); ?>
</body>

</html>