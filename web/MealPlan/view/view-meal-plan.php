<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Meal Plan For <?php echo $date; ?></title>
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
    <h1>Meal Plan For <?php echo $date; ?></h1>
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
                <td><a <?php echo "href='/MealPlan/recipe/index.php?action=view&id=".$recipeOneId."'";?>><?php echo $recipeOneName;?></a></td>
                <td><a <?php echo "href='/MealPlan/recipe/index.php?action=view&id=".$recipeTwoId."'";?>><?php echo $recipeTwoName;?></a></td>
                <td><a <?php echo "href='/MealPlan/recipe/index.php?action=view&id=".$recipeThreeId."'";?>><?php echo $recipeThreeName;?></a></td>
                <td><a <?php echo "href='/MealPlan/recipe/index.php?action=view&id=".$recipeFourId."'";?>><?php echo $recipeFourName;?></a></td>
                <td><a <?php echo "href='/MealPlan/recipe/index.php?action=view&id=".$recipeFiveId."'";?>><?php echo $recipeFiveName;?></a></td>
            </tr>
        </tbody>
    </table>
</main>

<footer>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . '/MealPlan/common/footer.php';
    ?>
</footer>
</html>