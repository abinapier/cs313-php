<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Meal Plans</title>
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
    <h1>My Meal Plans</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <a href="/MealPlan/mealPlan?action=add" title="Add a new meal plan" class="link-btn">Add a New Meal Plan</a>
    <a href="/MealPlan/mealPlan?action=edit" title="Edit your meal plans" class="link-btn">Edit Meal Plans</a>
    
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>