<?php
require('helpers.php');
require('index-logic.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Foobooks0</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <h1>Foobooks0</h1>
        </div>

        <div class="row">
            <a href="/all">View all books.</a>
        </div>

        <div class="row">
            <form method="POST" action="index.php">
                <label>Search for a book:
                    <input type="text" name="searchTerm" value="<?=$form->prefill('searchTerm', 'The Bell Jar'); ?>">
                </label>

                <label>Case sensitive:
                    <input type="checkbox" name="caseSensitive" value="1" <?=($caseSensitive) ? 'checked' : ''?>>
                </label>

                <input type="submit" value="Search">

                <?php if ($form->hasErrors) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?=$error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </form>
        </div>

        <div class="row">
            <?php if ($searchTerm && !$form->hasErrors) : ?>
                <p>You searched for <em><?=sanitize($searchTerm) ?></em></p>
            <?php else : ?>
                <p>Welcome to to foobooks0; enter a title above to search our library</p>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php if ($haveResults) : ?>
                <div class="card-deck">
                    <?php foreach ($books as $title => $book) : ?>
                        <div class="card">
                            <img class="card-img-top" src="<?=$book['cover_url'] ?>" alt="Cover photo for the book <?=$title ?>">
                            
                            <div class="card-body">
                                <h5 class="card-title"><?=$title ?></h5>

                                <p class="card-text"><?=$book['author'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php elseif ($searchTerm && !$form->hasErrors) : ?>
                <p>No Results</p>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php require('footer.php'); ?>
        </div>
    </div>
</body>
