<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create an Account</title>
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
    <h1>Create an Account</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form method="post" action="/acme/accounts/index.php">
        <label>Name:*<input type="text" name="clientName"></label>
        <label>Email:*<input type="email" name="clientEmail"></label>
        <label>Password:*<input type="password" name="clientPassword"></label>
        <input type="submit" value="Create Account">
        <input type="hidden" name="action" value="register">
    </form>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>