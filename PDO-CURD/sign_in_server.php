<?php

include('sign_in_class.php');

$u_email = $_GET['u_email'];
$u_pwd = $_GET['u_pwd'];

$err_email = "";
$err_pwd = "";

// for error messages
if (empty($_GET['u_email'])) {
    $err_email = "Email,";
}
if (empty($_GET['u_pwd'])) {
    $err_pwd = "Password,";
}

if ($u_email == null || $u_pwd == null) {
    header("location: sign_in_client.php?err_email=$err_email&err_pwd=$err_pwd&u_email=$u_email&u_pwd=$u_pwd");
}

// class obj 
$login = new UserLogin;
$login->connect_DB();
$login->LoginUser($u_email, $u_pwd);


header("location: dashboard_client.php");
