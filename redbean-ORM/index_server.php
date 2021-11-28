<?php
// include("RedBeanPHP5_7_1/rb.php");

// R::setup('mysql: host=localhost; dbname=guest_users', 'root', '');

// $name = $_REQUEST['name'];
// $email = $_REQUEST['email'];
// $pwd = $_REQUEST['pwd'];

// if (isset($_REQUEST['submit'])) {
// if ($name == null || $email == null || $pwd == null) {
// header('location: index.php?msg=Missing Fields!');
// } else {
// $user = R::dispense('temp');

// $user->name = $name;
// $user->email = $email;
// $user->password = $pwd;

// R::store($user);

// header('location: index.php?msg=Data successfully added!');
// }
// }


include("RedBeanPHP5_7_1/rb.php");

// this file is for the testing purpose 

R::setup("mysql: host=localhost; dbname=temp", 'root', '');

// create 
// $book = R::dispense('book');

// $book->title = "GOT3";
// $book->author = "John3";
// $book->publish_date = "2003";
// $book->price = "102";

// R::store($book);


// read all 
// $books = R::findAll('book');

// foreach ($books as $book) {
//     echo $book->title . "<br/>";
//     echo $book->author . "<br/>";
//     echo $book->publish_date . "<br/>";
//     echo $book->price . "<br/><hr/>";
// }

// $book = R::load('book', '2'); // by pk or id
// $book = R::findOne('book', 'title = ?', ['GOT']);
// echo $book->title;

// $book = R::load('book', '3');
// print_r($book);

// R::trash($book);

// $books = R::getAll('select * from book');
// foreach ($books as $book) {
//     echo $book['title'] . "<br/>";
//     echo $book['author'] . "<br/>";
//     echo $book['publish_date'] . "<br/>";
//     echo $book['price'] . "<br/><hr/>";
// }

// $books = R::findAll('book');
// R::trashAll($books);
// R::wipe('book');

R::close();
