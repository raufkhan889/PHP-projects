<?php

$u_email = "";
$u_pwd = "";
$err_email = "";
$err_pwd = "";
$empty = false;

// for error messages 
if (!empty($_GET['err_email'])) {
    $err_email = $_GET['err_email'];
    $empty = true;
}
if (!empty($_GET['err_pwd'])) {
    $err_pwd = $_GET['err_pwd'];
    $empty = true;
}

// for data values 
if (!empty($_GET['u_email'])) {
    $u_email = $_GET['u_email'];
    $empty = true;
}
if (!empty($_GET['u_pwd'])) {
    $u_pwd = $_GET['u_pwd'];
    $empty = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            font-family: sans-serif;
            width: 400px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 3px solid rgb(96, 192, 230);
        }

        h1 {
            font-size: 40px;
            text-align: center;
        }

        .row {
            margin-top: 10px;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            border-bottom: 1px solid black;
        }

        .row input {
            background: none;
            outline: none;
            border: 0px;
            padding: 10px;
            color: black;
            font-size: 18px;
            width: 100%;
        }

        .login {
            text-align: center;
            font-size: 14px;
        }

        .btn {
            text-align: center;
        }

        .btn input {
            margin: 30px 0px;
            outline: none;
            border: 0px;
            font-size: 18px;
            color: white;
            background: rgb(51, 51, 51);
            padding: 10px 80px;
        }

        .err-msg {
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Sign In</h1>
        <form action="sign_in_server.php" method="GET">
            <div class="row">
                <input type="email" name="u_email" value="<?php echo $u_email; ?>" placeholder="Email">
            </div>
            <div class="row">
                <input type="password" name="u_pwd" value="<?php echo $u_pwd; ?>" placeholder="Password">
            </div>
            <p class="login">Create new account <b>Sign Up</b></p>

            <div class="btn"><input type="submit" value="Sign In"></div>

            <p class="err-msg">
                <?php
                if ($empty)
                    echo "$err_email $err_pwd is required";

                ?>
            </p>
        </form>
    </div>
</body>

</html>