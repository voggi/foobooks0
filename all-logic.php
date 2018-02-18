<?php

require('Book.php');

use Foobooks0\Book;

$book = new Book('books.json');

$books = $book->getAll();
