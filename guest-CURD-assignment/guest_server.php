<?php

include('guest_class.php');

$name = $_GET['name'];
$email = $_GET['email'];
$gender = $_GET['gender'];
$nationality = $_GET['nationality'];
$skills = $_GET['skills']; // array from checkboxs
$post = $_GET['post'];
$textarea = $_GET['textarea'];
$via_email = $_GET['via_email'];
$terms = $_GET['terms'];

$err_name = '';
$err_email = '';
$err_gender = '';
$err_nationality = '';
$err_skills = '';
$err_post = '';
$err_textarea = '';
$err_terms = '';

if (empty($_GET['name'])) {
    $err_name = "Name required";
}
if (empty($_GET['email'])) {
    $err_email = "Email required";
}
if (empty($_GET['gender'])) {
    $err_gender = "Gender required";
}
if (empty($_GET['nationality'])) {
    $err_nationality = "Nationality required";
}
if (empty($_GET['skills'])) {
    $err_skills = "Skills required";
}
if (empty($_GET['post'])) {
    $err_post = "Post required";
}
if (empty($_GET['textarea'])) {
    $err_textarea = "Resume required";
}
if (empty($_GET['terms'])) {
    $err_terms = "Please agree to our terms of services";
}

if (
    $name == null ||
    $email == null ||
    $gender == null ||
    $nationality == null ||
    $skills == null ||
    $post == null ||
    $textarea == null ||
    $terms == null
) {
    header("location: guest_client.php?err_name=$err_name&err_email=$err_email&err_gender=$err_gender&err_nationality=$err_nationality&err_skills=$err_skills&err_post=$err_post&err_textarea=$err_textarea&err_terms=$err_terms&name=$name&email=$email&gender=$gender&nationality=$nationality&skills=$skills&post=$post&textarea=$textarea&terms=$terms");
} else {
    $user = new GuestUser;
    $user->connect_DB();
    $user->guestRequest($name, $email, $gender, $nationality, $skills, $post, $textarea, $via_email, $terms);
    $user->close_db();
}
