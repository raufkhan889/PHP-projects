<?php

include('product_class.php');
include('category_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$id = '';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

$category = new Category;
$category->connect_DB();
$categorirs_data = $category->getAllCategories();
$category->close_db();

$product = new Product;
$product->connect_DB();
$product_data = $product->getProductByID($id);
$product->close_db();

?>

<?php include('header.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <a href="manage_products.php" class="btn btn-outline-secondary float-start">Go Back &larr;</a>
        <h1 class="text-center my-4">Update Product</h1>

        <form class="w-50 m-auto" action="edit_product_server.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="p_id" value="<?php echo $id; ?>">

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Picture</label>
                <div class="col-sm-9">
                    <input type="file" name="p_image" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Title</label>
                <div class="col-sm-9">
                    <input type="text" name="p_title" value="<?php echo $product_data['title']; ?>" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Description</label>
                <div class="col-sm-9">
                    <input type="text" name="p_description" value="<?php echo $product_data['description']; ?>" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Price Rs</label>
                <div class="col-sm-9">
                    <input type="number" name="p_price" value="<?php echo $product_data['price']; ?>" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Stock Qty</label>
                <div class="col-sm-9">
                    <input type="number" name="p_stock_qty" value="<?php echo $product_data['stock']; ?>" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 row align-items-center">
                <label class="col-sm-3 col-form-label fs-4">Category</label>
                <div class="col-sm-9">
                    <select name="category" class="form-select fw-bold" required>
                        <option value="<?php echo $product_data['name']; ?>"><?php echo $product_data['name']; ?></option>
                        <?php
                        foreach ($categorirs_data as $category) {
                            echo '
                                <option value="' . $category['cID'] . '">' . $category['name'] . '</option>
                            ';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="rowalign-items-center">
                <div class="text-center">
                    <input type="submit" value="Update" class="form-control btn btn-success">
                </div>
            </div>

        </form>

    </div>

    <?php include('footer.php'); ?>

    <?php

    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo ' 
        <script>
            swal({
                title: "' . $_SESSION['status'] . '",
                icon: "' . $_SESSION['status_code'] . '",
                button: "OK",
            });
        </script>  
        ';
        // when message is printed
        unset($_SESSION['status']);
    }

    ?>
</body>

</html>