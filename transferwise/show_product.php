<?php

include('product_class.php');

if (session_id() == '') {
    session_start();
}

$id = null;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

$product = new Product;
$product->connect_DB();

$product_data = $product->getProductByID($id);

$product->close_db();

?>

<?php include('header.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container my-4 p-3 shadow-lg">

        <div class="row">
            <div class="col-lg-6 overflow-hidden">

                <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-outline-secondary float-start">
                    Continue Shopping &larr;
                </a>

                <img src="./uploads/<?php echo $product_data['picture']; ?>" class="img-thumbnail border-0" width="90%" alt="">
            </div>
            <div class="col-lg-6">
                <div class="px-3">

                    <h2 class="py-4">
                        <?php echo $product_data['title']; ?>
                    </h2>
                    <p class="lead overflow-auto" style="height: 120px; overflow: scroll;">
                        <?php echo $product_data['description']; ?>
                    </p>
                    <div class="fs-4 py-2">
                        Price <b>$ <?php echo $product_data['price']; ?></b>
                    </div>
                    <div class="fs-5 text-muted py-2">
                        Stock left - <?php echo $product_data['stock']; ?>x
                    </div>

                    <div class="fs-3 py-2">&starf;&starf;&starf;&starf;&star;</div>

                    <button type="submit" class="mt-5 d-block w-100 btn btn-success">Add to Card</button>
                </div>
            </div>
        </div>



    </div>

    <?php include('footer.php'); ?>

</body>

</html>