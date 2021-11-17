===========================================
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <h1 class="text-center my-4">Add a Car</h1>

        <form action="index_server.php" method="POST" class="w-50 mx-auto my-4">

            <div class="mb-3">
                <input type="text" name="car_name" class="w-100 form-control" placeholder="Car Name...">
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="w-100 form-control" placeholder="Enter Email...">
            </div>

            <div class="mb-3">
                <input type="password" name="pwd" class="w-100 form-control" placeholder="Create Password...">
            </div>

            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-dark w-100 form-control">
            </div>

        </form>
    </div>
</body>

</html>