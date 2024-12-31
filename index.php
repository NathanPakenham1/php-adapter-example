<?php


class Book
{
    private $bookName;
    private $bookAuthor;

    public function __construct($name, $author) {
        $this->bookName = $name;
        $this->bookAuthor = $author;
    }

    public function getBookName() {
        return $this->bookName;
    }

    public function getBookAuthor() {
        return $this->bookAuthor;
    }
}

class BookFactory
{
    public function create($name, $author) {
        return new Book($name, $author);
    }
}

class Libary {
    private $bookFactory;

    public function __construct(BookFactory $bookFactory) {
        $this->bookFactory = $bookFactory;
    }

    public function addBook($name, $author) {
        $book = $this->bookFactory->create($name, $author);

        return $book;
    }
}

$bookFactory = new BookFactory();

$libary = new Libary($bookFactory);

$book = $libary->addBook('2024', 'The Trading Game');

echo $book->getBookName() . '<br>';
echo $book->getBookAuthor() . '<br>';