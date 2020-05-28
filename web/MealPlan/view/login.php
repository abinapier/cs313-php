<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login to MealPlan</title>
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
    <h1>Login</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form action="/MealPlan/accounts/index.php" method="post">
        <label>Email:<input type="text" name="email" required></label>
        <label>Password:<input type="password" name="password" required></label>
        <input type="submit" value="Sign In">
        <input type="hidden" name="action" value="login">
    </form>

    <a href="/MealPlan/accounts/index.php?action=addAccount" title="Create a new account" class="link-btn">Create a New Account</a>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>