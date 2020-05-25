<?php
    session_start();
    require_once '../library/connections.php';
    require_once '../model/recipe-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }
    echo $action;
    switch ($action){
        case 'view':
            
            $recipeID = filter_input(INPUT_GET, 'id');
            $name = getRecipeName($recipeID);
            $ingredients = getIngredients($recipeID);
            $instructions = getInstructions($recipeID);
            include '../view/view-recipe.php';
        break;
        case 'add':
            include '../view/add-recipe.php';
        break;
        case 'edit':
            $message = getRecipeListEdit();
            include '../view/edit-recipe-list.php';
        break;
        case 'delete':
            echo "delete";
            exit;
            foreach( $_POST as $key => $val ) {
                echo "post";
                $postId = filter_input(INPUT_POST, $key);
                if( strpos($key, 'recipe') !== false) {
                    echo "recipe";
                    if(isset($_POST[$key])){
                        echo "checked";
                        deleteRecipe($postId);
                    }
                } 
            }
            include '../view/search-recipebox.php';
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