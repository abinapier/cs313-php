<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Your Recipes</title>
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
    <h1>Edit Your Recipe List</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <a href="/MealPlan/recipe?action=search" title="Back to recipes">Cancel</a>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>