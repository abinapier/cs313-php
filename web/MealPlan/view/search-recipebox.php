<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Recipes</title>
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
    <h1>My Recipes</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>

    <a href="/MealPlan/view/recipe?action=add" title="Add a new recipe" class="link-btn">Add a New Recipe</a>
    <a href="/MealPlan/view/recipe?action=delete" title="Edit your Recipe List" class="link-btn">Edit Recipe List</a>
    
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>