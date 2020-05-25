<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add a Recipe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="/MealPlan/css/style.css">
    <script src="../js/recipe.js"></script>
</head>
<header>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/header.php';
    ?>
</header>

<main>
    <h1>Add a New Recipe</h1>
    <form method="post" action="/MealPlan/recipe/index.php">
        <label>Recipe Name:<input type="text" name="name"></label>
        <fieldset id="ingredientArea">
            <legend>Ingredients:</legend>
            <label class="amount">Amount: <input type="text" name="amount1"></label>
            <label class="ingredient">Name: <input type="text" name="ingredient1"></label>
            <input id="addIngredient" type="button" name="addIngredient" value="+ ingredient" onclick="addIngredientEntry()">
        </fieldset>

        <label>Instructions:<textarea></textarea></label>
        <input type="submit" value="Add Recipe">
        <input type="hidden" name="action" value="insert">
    </form>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>