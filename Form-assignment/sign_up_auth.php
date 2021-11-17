<?php

$server = "localhost";
$db_name = "social_media";
$username = "root";
$password = "";

$conn = new PDO("mysql: host=$server; dbname=$db_name", $username, $password);

if($conn) 
    print "connected to database, successfully!";
else 
    print "Fail to connect!";


?>