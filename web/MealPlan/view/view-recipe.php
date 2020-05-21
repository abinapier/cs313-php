<?php
// Start the session
session_start();
require_once '../model/recipe-model.php';
$id = $_GET['id'];
$name = getRecipeName($id);
$ingredients = getIngredients($id);
$instructions = getInstructions($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $name?></title>
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
    <h1><?php echo $name?></h1>
    <?php
        echo $ingredients;
        echo $instructions;
    ?>

    <a class="link-btn" href="/acme/recipe?action=search">Back to Recipes</a>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>