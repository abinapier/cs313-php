<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MealPlan Home</title>
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
    <img src="../images/food-splash.jpg" alt="fresh produce">
    <h1>MealPlan</h1>
    <div class="homepage">
        <a class="link-btn" href="/MealPlan/recipe?action=search" title="Browse Recipes">Browse Your Recipes</a>
        <a class="link-btn" href="/MealPlan/mealPlan?action=search" title="Browse Meal Plans">Browse Your Meal Plans</a>
        <a class="link-btn" href="/MealPlan/shoppingList?action=view" title="View Your Shopping List">View Your Shopping List</a>
    </div>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>