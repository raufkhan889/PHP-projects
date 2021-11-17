<?php

echo $u_name = $_GET['u_name'];
echo $u_passport = $_GET['passport'];

if (empty($_GET['u_name']))
    header("location: client.php?name_err=name_empty");   

?>