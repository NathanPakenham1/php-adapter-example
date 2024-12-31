<?php

class Book {
    private $bookName;
    private $bookAuthor;
    const BR = '<br />';

    public function __construct($name,$author) {
        $this->bookName = $name;
        $this->bookAuthor = $author;
    }

    public function getNameAndAuthor() {
        return $this->bookName . ' - ' . $this->bookAuthor.self::BR;;
    }
}

class BookFactory {
    public static function create($name,$author) {
        return new Book($name,$author);
    }
}

$book1 = BookFactory::create("John Doe","John Doe");

echo $book1->getNameAndAuthor();