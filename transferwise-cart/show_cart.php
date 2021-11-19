<?php

if (session_id() == '') {
    session_start();
}
if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

$total = 0;

?>

<?php include('header.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="float-end btn btn-outline-secondary">Continue Shopping</a>
        <h1 class="text-center my-4">Cart Items</h1>
        <div class="cart-refresh">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

                <?php
                if (!empty($_SESSION['cart'])) {
                    $total = 0;
                    foreach ($_SESSION['cart'] as $items) {
                        echo '
                    <tr>
                        <td>' . $items['id'] . '</td>
                        <td>' . $items['name'] . '</td>
                        <td>$' . number_format($items['price'], 2) . '</td>
                        
                        <td class="">
                            <i class="fa fa-plus" aria-hidden="true" onclick="addItemQuantity(' . $items['id'] . ')"></i>
                            <div class="d-inline"> 
                                <div class=" d-inline border border-dark mx-2 px-3"> ' . $items['quantity'] . ' </div>
                            </div>
                            <i class="fa fa-minus" aria-hidden="true" onclick="dropItemQuantity(' . $items['id'] . ')"></i>
                        </td>
                        
                        <td class="fw-bold">$' . number_format(($items['quantity'] * $items['price']), 2) . '</td>
                        <td><a href="cart_operations.php?cart_id=' . $items['id'] . '&action=remove" class="btn btn-danger">Remove</a></td>
                    </tr>
                    ';
                        $total = $total + ($items['quantity'] * $items['price']);
                    }
                }
                ?>
            </table>
            <div class="my-3 lead fw-bold border p-4">
                <div class="text-center">
                    <b>Total Bill: </b> <span class="fst-italic">
                        $<?php echo number_format($total, 2) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script>
        function addItemQuantity(id) {
            $.ajax({
                type: 'POST',
                url: "cart_operations.php",
                data: {
                    "id": id,
                    "action": "add"
                },
                success: function(response) {
                    $('.cart-refresh').load(location.href + " .cart-refresh>*", "");
                    // location.reload();
                }
            });
        }

        function dropItemQuantity(id) {
            $.ajax({
                type: 'POST',
                url: "cart_operations.php",
                data: {
                    "id": id,
                    "action": "drop"
                },
                success: function(response) {
                    location.reload();
                    // $('.cart-refresh').load(location.href + " .cart-refresh>*", "");
                }
            });
        }
    </script>
</body>

</html>