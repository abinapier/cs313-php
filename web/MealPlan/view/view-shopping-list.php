<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Shopping List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="/MealPlan/css/style.css">
</head>
<header>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/header.php';
    ?>
</header>

<main>
    <h1>My Shopping List</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    echo 'hi!';
    require_once '../model/shopping-list-model.php';
    echo getListItems();
    ?>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>