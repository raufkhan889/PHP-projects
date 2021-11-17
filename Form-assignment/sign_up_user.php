<?php

include("sign_up_class.php");

if (empty($_GET['f_name'])) {
    header("location: sign_up_form.php?err_message1=first name required");
}
if (empty($_GET['l_name'])) {
    header("location: sign_up_form.php?err_message2=last name required");
}
if (empty($_GET['u_email'])) {
    header("location: sign_up_form.php?err_message3=user email required");
}
if (empty($_GET['u_pwd'])) {
    header("location: sign_up_form.php?err_message4=user password required");
}

$f_name = $_GET['f_name'];
$l_name = $_GET['l_name'];
$u_email = $_GET['u_email'];
$u_pwd = $_GET['u_pwd'];

// class obj 
$user = new SignUp;

$user->setFirstName($f_name);
$user->setLastName($l_name);
$user->setUserEmail($u_email);
$user->setUserPassword($u_pwd);

echo "First Name: " . $user->getFirstName() . "<br/>";
echo "Last Name: " . $user->getLastName() . "<br/>";
echo "User Email: " . $user->getUserEmail() . "<br/>";
echo "User Password: " . $user->getUserPassword() . "<br/>";
