<?php
require('helpers.php');
require('all-logic.php');
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
            <a href="/">&larr; Return home.</a>
        </div>

        <div class="row">
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
        </div>

        <div class="row">
            <?php require('footer.php'); ?>
        </div>
    </div>
</body>
