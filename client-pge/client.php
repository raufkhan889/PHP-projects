<?php

$name_err = "";
$passport_err = "";

if(!empty($_GET['name_err']))
    $name_err = $_GET['name_err'];


if(!empty($_GET['name_err']))
    $name_err = $_GET['name_err'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="server.php" method="get">
        <h1>Sign up</h1>
        <input type="text" name="u_name" id="" placeholder="Name">
        <label style="color:red;" for=""> <?php echo $name_err; ?> </label>
        <br>

        <input type="text" name="passport" placeholder="PassPort">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>