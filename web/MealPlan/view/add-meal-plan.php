<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Meal Plan</title>
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
    <h1>Create a New Meal Plan</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form method='post' action="/MealPlan/mealPlan/index.php">
    <label> Date: <input type="date" name="date"></label>
    <table>
        <thead>
            <tr>
                <th>Day 1</th>
                <th>Day 2</th>
                <th>Day 3</th>
                <th>Day 4</th>
                <th>Day 5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo '<select name="dayOne">'.$recipeSelect.'</select>';?></td>
                <td><?php echo '<select name="dayTwo">'.$recipeSelect.'</select>';?></td>
                <td><?php echo '<select name="dayThree">'.$recipeSelect.'</select>';?></td>
                <td><?php echo '<select name="dayFour">'.$recipeSelect.'</select>';?></td>
                <td><?php echo '<select name="dayFive">'.$recipeSelect.'</select>';?></td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="action" value="verify">
    <input type="submit" value="Add Meal Plan">
    </form>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>