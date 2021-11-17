<?php

include("form_class.php");

$u_name = $_GET['u_name'];
$u_mother = $_GET['u_mother'];
$u_guardian = $_GET['u_guardian']; 
$dob_day = $_GET['dob_day'];
$dob_month = $_GET['dob_month'];
$dob_year = $_GET['dob_year'];
$gender = $_GET['gender'];
$category = $_GET['category'];
$special_category = $_GET['s_category'];
$LAS = $_GET['LAS'];
$minority = $_GET['Minority'];
$annual_income = $_GET['annual_income'];

$user = new User;

$user->setUser($u_name, $u_mother, $u_guardian,
                $dob_day, $dob_month, $dob_year, 
                $gender, $category, $special_category, 
                $LAS, $minority, $annual_income);

$user->printUser();


?>