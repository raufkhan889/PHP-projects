<?php

$msg = "";

if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
}

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
        <h1 class="text-center"> Add Products</h1>

        <div class="d-flex justify-content-between">
            <a href="add_product.php" class="btn btn-outline-primary  ">Add Product</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="alert alert-success"><?php echo $msg; ?></div>
        <form action="add_product_server.php" method="POST" enctype="multipart/form-data" class="w-50 mx-auto my-5    ">
            <div class="mb-3">
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="title" required>
            </div>
            <div class="mb-3">
                <input type="text" name="description" class="form-control" required placeholder="Description">
            </div>
            <div class="mb-3">
                <input type="number" name="price" class="form-control" required placeholder="Price">
            </div>
            <div class="mb-3">
                <input type="number" name="stock" class="form-control" required placeholder="Stock">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary">
            </div>

        </form>
    </div>
    <script src="./JS"></script>
</body>

</html>