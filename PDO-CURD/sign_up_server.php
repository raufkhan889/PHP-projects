<?php

include('sign_up_class.php');

$f_name = $_GET['f_name'];
$l_name = $_GET['l_name'];
$u_email = $_GET['u_email'];
$u_pwd = $_GET['u_pwd'];

$err_fname = "";
$err_lname = "";
$err_email = "";
$err_pwd = "";

if ($f_name == null) {
    $err_fname = "First name,";
}
if ($l_name == null) {
    $err_lname = "Last name,";
}
if ($u_email == null) {
    $err_email = "email,";
}
if ($u_pwd == null) {
    $err_pwd = "Password";
}

if (
    $f_name == null ||
    $l_name == null ||
    $u_email == null ||
    $u_pwd == null
) {
    header(
        "location: sign_up_client.php?err_fname=$err_fname&err_lname=$err_lname&err_email=$err_email&err_pwd=$err_pwd&f_name=$f_name&l_name=$l_name&u_email=$u_email&u_pwd=$u_pwd"
    );
}

$user = new User;
$user->connect_DB();
$user->registerUser($f_name, $l_name, $u_email, $u_pwd);

header("location: sign_in_client.php");
