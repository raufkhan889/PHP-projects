<?php

include('product_class.php');

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$product = new Product;
$product->connect_DB();
$all_Products = $product->getAllProducts();
$product->close_db();

?>

<?php include('header.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <a href="dashboard.php" class="btn btn-outline-secondary float-start">Go Back &larr;</a>
        <h1 class="text-center my-4">Manage Product</h1>

        <div class="mb-3 d-flex justify-content-between align-items-center">

            <div>
                <a class="btn btn-outline-secondary p-2" href="add_product_client.php">
                    Add new Product
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                </a>

            </div>

            <form action="search_product.php" method="GET" class="d-flex">
                <input class="form-control me-2" name="search" type="search" placeholder="Search Product" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>

        </div>

        <div class="row shadow-lg py-2 content-div">
            <div class="col-lg-12">
                <div class="d-flex fw-bold py-3">
                    <div style="flex: 1">Picture</div>
                    <div style="flex: 1">Title</div>
                    <div style="flex: 1">Category</div>
                    <div style="flex: 1">Price</div>
                    <div style="flex: 1">Stock Count</div>
                    <div style="flex: 2">Operations</div>
                </div>
            </div>

            <?php
            foreach ($all_Products as $product) {
                echo "
                <hr>
                <div class='col-lg-12'>
                    <div class='d-flex py-2 align-items-center'>
                        <div style='flex: 1'><img src='./uploads/" . $product['picture'] . "' width='80px'></div>
                        <div style='flex: 1'>" . $product['title'] . "</div>
                        <div style='flex: 1'>" . $product['name'] . "</div>
                        <div style='flex: 1'>$" . $product['price'] . "</div>
                        <div style='flex: 1'>" . $product['stock'] . "x</div>
                        <div style='flex: 2'>
                            <a href='show_product.php?id=" . $product['pID'] . "' class='btn btn-primary'>Show</a>
                            &nbsp;
                            <a href='edit_product_client.php?id=" . $product['pID'] . "' class='btn btn-success'>Edit</a>
                            &nbsp;
                            <a href='javascript:void(0)' onclick='deleteProduct(" . $product['pID'] . ")' class='del_product_btn btn btn-danger'>Delete</a>
                        </div>
                    </div>
                </div>
                    ";
            }
            ?>

        </div>
    </div>

    <?php include('footer.php') ?>

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

    <script>
        function deleteProduct(product_id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Product!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            type: 'POST',
                            url: 'delete_product.php',
                            data: {
                                'is_del_set': 1,
                                'product_id': product_id
                            },
                            success: function(response) {
                                swal("Product has been deleted!", {
                                    icon: "success",
                                }).then((result) => {
                                    $('.content-div').load(location.href + " .content-div>*", "");
                                });
                            }
                        });
                    }
                });
        }
    </script>
</body>

</html>