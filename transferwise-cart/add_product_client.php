<?php

include_once('category_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$msg = "";

if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
}

$categories = new Category;
$categories->connect_DB();
$categories_data = $categories->getAllCategories();
$categories->close_db();

?>

<?php include('header.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <a href="manage_products.php" class="btn btn-outline-secondary float-start">Go Back &larr;</a>
        <h1 class="text-center my-4">Add Product</h1>

        <form class="w-50 m-auto" action="add_product_server.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Picture</label>
                <div class="col-sm-9">
                    <input type="file" name="p_image" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Title</label>
                <div class="col-sm-9">
                    <input type="text" name="p_title" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Description</label>
                <div class="col-sm-9">
                    <input type="text" name="p_description" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Price in $ </label>
                <div class="col-sm-9">
                    <input type="number" name="p_price" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Stock Qty</label>
                <div class="col-sm-9">
                    <input type="number" name="p_stock_qty" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Category</label>
                <div class="col-sm-9">
                    <select name="category" class="form-select fw-bold" required>
                        <option value="">Select...</option>
                        <?php
                        foreach ($categories_data as $category) {
                            echo '<option value="' . $category['cID'] . '">' . $category['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="text-center">
                    <input type="submit" value="Add" class="form-control btn btn-success">
                </div>
            </div>

            <div class="alert text-center p-1 mt-2" role="alert">
                <?php echo $msg; ?>
            </div>

        </form>

    </div>

    <?php include('footer.php'); ?>
</body>

</html>