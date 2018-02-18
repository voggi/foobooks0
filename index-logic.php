<?php

require('Book.php');
require('Form.php');

use DWA\Form;
use Foobooks0\Book;

$form = new Form($_POST);

$book = new Book('books.json');

$haveResults = false;

$searchTerm = $form->get('searchTerm', '');

$caseSensitive = $form->has('caseSensitive');

if ($form->isSubmitted()) {
    $errors = $form->validate([
         'searchTerm' => 'required|alphaNumeric',
    ]);

    if (!$form->hasErrors) {
        $books = $book->getByTitle($searchTerm, $caseSensitive);

        if (count($books) > 0) {
            $haveResults = true;
        }
    }
}
