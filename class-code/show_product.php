<?php

include('product_class.php');

$id = $_GET['id'];

$product = new Product;
$product->connectDB();
$p = $product->getProductByID($id);
$product->close_DB();

$item = $p->fetch(PDO::FETCH_ASSOC);

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
        <h1 class="text-center"> Product </h1>


        <div class="row">
            <div class="col-lg-6">
                <img src="./uploads/<?php echo $item['image']; ?>" width=" 100%" class="overflow-none" alt="">
            </div>
            <div class="col-lg-6">
                <div>
                    <div>Title: <?php echo $item['title']; ?> </div>
                    <p><?php echo $item['description']; ?></p>
                    <div><?php echo $item['price']; ?></div>
                    <div><?php echo $item['stock']; ?></div>
                </div>
            </div>
        </div>




    </div>
    <script src="./JS"></script>
</body>

</html>