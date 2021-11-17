<?php

if (session_id() == '') {
    session_start();
}

if (isset($_SESSION['user_name']) && $_SESSION['logged_in'] == true) {
    header('location: home.php');
}

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
    <title>Login User </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: rgb(236, 236, 236);
        }

        .custome-container {
            width: 800px;
            display: flex;
            height: 456.172px;
            background-color: white;
            padding: 0;
        }

        .title {
            color: rgb(10, 76, 175);
            font-size: 25px;
            font-weight: bold;
            padding: 0px 50px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .radio-label {
            color: rgba(10, 76, 175, 0.788);
            font-weight: 400;
        }

        .c-color {
            color: rgba(0, 45, 112, 0.788);
            font-weight: 600;
        }

        .green {
            background-color: rgb(7, 199, 87);
            color: white;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container custome-container shadow mt-5">
        <div class="cover"><img src="./images/cover-1.jpg" width="300px" height="456.172px" alt=""></div>
        <div class="form w-100">
            <div class="logo py-5 d-flex justify-content-center"><img src="./images/Transferwise_logo.png" width="150px" alt="">
            </div>
            <div class="title">Welcome to money without borders.</div>
            <div class="text-center text-muted">Create an account?
                <a href="sign_up_client.php" class="text-info fw-bold">Sign Up</a>
            </div>

            <form action="login_server.php" method="GET" class="mx-5 my-3">
                <div class="w-100 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Your email address" required>
                </div>
                <div class="w-100 mb-3">
                    <input type="password" name="pwd" class="form-control" placeholder="Create a password" required>
                </div>

                <div class="w-100 mb-3">
                    <input type="submit" value="Log in" class="form-control btn green">
                </div>

                <div class="text-center text-muted">Or, continue with
                    <a href="#" class="text-info fw-bold">Google</a> or
                    <a href="#" class="text-info fw-bold">Facebook</a>
                </div>
            </form>

        </div>
    </div>

    <?php include('footer.php'); ?>

    <script>
        <?php
        if ($msg != '') {
            echo 'swal({text: "' . $msg . '"});';
        }
        $msg = '';
        ?>
    </script>

</body>

</html>