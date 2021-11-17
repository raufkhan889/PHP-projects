<?php

class Book {
    private $title;
    private $description;
    private $author;

    public function __construct(){
        echo "constructor Ran ..." . "<br/>";
    }

    public function setBook($title, $des, $author) {
        $this->title = $title;
        $this->description = $des;
        $this->author = $author;
    }

    public function printBook() {
        echo $this->title . "<br/>";
        echo $this->description . "<br/>";
        echo $this->author . "<br/>";
    }
}



?>