<?php

$err_message1 = "";
$err_message2 = "";
$err_message3 = "";
$err_message4 = "";


if (!empty($_GET['err_message1'])) {
    $err_message = $_GET['err_message1'];
}
if (!empty($_GET['err_message2'])) {
    $err_message = $_GET['err_message2'];
}
if (!empty($_GET['err_message3'])) {
    $err_message = $_GET['err_message3'];
}
if (!empty($_GET['err_message4'])) {
    $err_message = $_GET['err_message4'];
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
        <h1>Sign Up</h1>
        <form action="sign_up_user.php" method="GET">
            <div class="row">
                <input type="text" name="f_name" id="" placeholder="First Name">
            </div>
            <div class="row">
                <input type="text" name="l_name" id="" placeholder="Last Name">
            </div>
            <div class="row">
                <input type="email" name="u_email" id="" placeholder="Email">
            </div>
            <div class="row">
                <input type="password" name="u_pwd" id="" placeholder="Password">
            </div>
            <p class="login">Already a member <b>Log in</b></p>

            <div class="btn"><input type="submit" value="Sign up"></div>

            <p class="err-msg"> <?php echo $err_message1 . $err_message2 . $err_message3 . $err_message4; ?> </p>
        </form>
    </div>
</body>

</html>