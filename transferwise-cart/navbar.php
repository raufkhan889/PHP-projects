<?php

require_once('category_class.php');

$category = new Category;
$category->connect_DB();
$all_categories = $category->getAllCategories();
$category->close_db();

if (session_id() == '') {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">

        <a class="navbar-brand" href="home.php">TransferWise</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>

                <?php
                if (isset($_SESSION['user_name']) && $_SESSION['logged_in'] == true) {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    ';
                }
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="view_products.php">Products</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        foreach ($all_categories as $category) {
                            echo '
                                <li>
                                    <a class="dropdown-item d-flex justify-content-between" href="product_categories.php?cat=' . $category['cID'] . '">
                                        ' . $category['name'] . '
                                        <i class="fa fa-headphones" aria-hidden="true"></i>
                                    </a>
                                </li>
                                ';
                        }
                        ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item disabled" href="#">Coming soon</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-end w-100">
                <?php
                if (isset($_SESSION['user_name']) && $_SESSION['logged_in'] == true) {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">' . $_SESSION['user_name'] . '</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li class="">
                        <a class="btn btn-warning" href="show_cart.php" style="position: relative;">
                            Cart 
                            <i class="fa fa-shopping-cart" aria-hidden="true">';
                    if (!empty($_SESSION['cart'])) {
                        echo '
                            <span class="bg-danger rounded-circle px-1" style="position:absolute; top:0;">
                                ' . sizeof($_SESSION['cart']) . '
                            </span>
                            ';
                    }
                    echo '</i>
                        </a>
                        
                    </li>
                        ';
                } else {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="login_client.php">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="sign_up_client.php">Sign Up</a>
                    </li>    
                    ';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- end of navbar  -->