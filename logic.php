<?php

$booksJson = file_get_contents('books.json');

$books = json_decode($booksJson, true);

$haveResults = false;

// if (isset($_GET['searchTerm'])) {
//     $searchTerm = $_GET['searchTerm'];
// } else {
//     $searchTerm = '';
// }

$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

// $searchTerm = $_GET['searchTerm'] ?? '';

if ($searchTerm) {
    foreach ($books as $title => $book) {
        if ($title != $searchTerm) {
            unset($books[$title]);
        }
    }

    if (count($books) > 0) {
        $haveResults = true;
    }
}
