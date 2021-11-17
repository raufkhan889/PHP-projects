<?php

if (session_id() == '') {
    session_start();
}

if (!isset($_SESSION['user_name']) && $_SESSION['logged_in'] == false) {
    header('location: login_client.php?msg=Login First!');
}

require_once('category_class.php');

$categories = new Category;
$categories->connect_DB();
$categories_data = $categories->getAllCategories();
$categories->close_db();


?>



<?php include('header.php'); ?>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <h1 class="text-center my-4">All Categories</h1>

        <div class="list-group w-50 mx-auto pt-4">
            <button type="button" class="list-group-item bg-success list-group-item-action active" aria-current="true">
                Product Categories Name
            </button>
            <?php
            foreach ($categories_data as $category) {
                echo '
                    <button type="button" class="list-group-item list-group-item-action"> ' . $category['name'] . ' <a href="del_category_server.php?cID=' . $category['cID'] . '" class="btn btn-danger float-end">Delete</a> </button>
                    ';
            }
            ?>
            <hr class="">

            <form action="add_category_server.php" method="GET">
                <input type="text" name="new_cat" class="form-control" placeholder="Type here..">
                <input type="submit" class="btn btn-outline-secondary my-2 d-block w-100" value="Add New">
            </form>

        </div>
    </div>

    <?php include('footer.php'); ?>

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '
            <script>
                swal({
                    "title": "' . $_SESSION['status'] . '",
                    "icon": "' . $_SESSION['status_code'] . '",
                    "button": "OK"
                });
            </script>
        
        ';
        unset($_SESSION['status']);
    }
    ?>

</body>

</html>