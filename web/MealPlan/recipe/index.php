<?php
    session_start();
    require_once '../library/connections.php';
    require_once '../model/recipe-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'view':
            
            $recipeID = filter_input(INPUT_GET, 'id');
            echo 'get';
            $name = getRecipeName($recipeID);
            echo 'name';
            $ingredients = getIngredients($recipeID);
            echo 'ingredients';
            $instructions = getInstructions($recipeID);
            echo 'database';
            include '../view/view-recipe.php';
        break;
        case 'add':
            include '../view/add-recipe.php';
        break;
        case 'search':
            if(isset($_SESSION['user_id'])){
                $message = getRecipes();
                include '../view/search-recipebox.php';
                exit;
            }
            $message = "You must log in before you can access your recipes.";
            include '../view/login.php';
        break;
        default:
            
    }
?>