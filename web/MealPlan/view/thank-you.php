<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank You</title>
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
    <h1>Thank You</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>

    <a href="/MealPlan/accounts/index.php?action=register" title="Create a new account" class="link-btn">Create a New Account</a>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>