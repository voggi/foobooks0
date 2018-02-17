<?php

namespace Foobooks0;

class Book
{
    private $books;

    public function __construct($dataFile)
    {
        $booksJson = file_get_contents($dataFile);

        $this->books = json_decode($booksJson, true);
    }

    public function getAll()
    {
        return $this->books;
    }

    public function getByTitle($searchTitle, $caseSensitive = false)
    {
        $results = [];

        foreach ($this->books as $title => $book) {
            if ($caseSensitive) {
                $match = $title == $searchTitle;
            } else {
                $match = strtolower($title) == strtolower($searchTitle);
            }

            if ($match) {
                $results[$title] = $book;
            }
        }

        return $results;
    }
}
