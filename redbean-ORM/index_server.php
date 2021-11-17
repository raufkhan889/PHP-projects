<?php

include("RedBeanPHP5_7_1/rb.php");

R::setup('mysql: host=localhost; dbname=guest_users', 'root', '');

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$pwd = $_REQUEST['pwd'];

if (isset($_REQUEST['submit'])) {
    if ($name == null || $email == null || $pwd == null) {
        header('location: index.php?msg=Missing Fields!');
    } else {
        $user = R::dispense('temp');

        $user->name = $name;
        $user->email = $email;
        $user->password = $pwd;

        R::store($user);

        header('location: index.php?msg=Data successfully added!');
    }
}
