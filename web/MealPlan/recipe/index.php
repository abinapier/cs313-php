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
            $name = getRecipeName($recipeID);
            $ingredients = getIngredients($recipeID);
            $instructions = getInstructions($recipeID);
            include '../view/view-recipe.php';
        break;
        case 'add':
            include '../view/add-recipe.php';
        break;
        case 'insert':
            $recipeName = filter_input(INPUT_POST, 'name');
            $amountOne = filter_input(INPUT_POST, 'amount1');
            $ingredientOne = filter_input(INPUT_POST, 'ingredient1');
            $instructions = filter_input(INPUT_POST, 'instructions');
            if(empty($recipeName) || empty($amountOne) || empty($ingredientOne) || empty($instructions)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/add-recipe.php';
                exit; 
            }
            $amounts = array();
            $ingredients = array();
            foreach( $_POST as $key => $val ) {
                $nameVal = filter_input(INPUT_POST, $key);
                $value = filter_input(INPUT_POST, $val);
                if( strpos($nameVal, 'amount') !== false) {
                    if(!empty($value)){
                        $amounts[] = $value;
                    }
                } 
                if( strpos($nameVal, 'ingredient') !== false) {
                    if(!empty($value)){
                        $ingredients[] = $value;
                    }
                } 
            }
            addRecipe($recipeName, $instructions, $amounts, $ingredients);
            //echo 'this will add the recipe';
        break;
        case 'edit':
            $message = getRecipeListEdit();
            include '../view/edit-recipe-list.php';
        break;
        case 'delete':
            foreach( $_POST as $key => $val ) {
                $postId = filter_input(INPUT_POST, $key);
                if( strpos($key, 'recipe') !== false) {
                    if(isset($_POST[$key])){
                        $message = deleteRecipe($postId);
                        if($message != ''){
                            include '../view/edit-recipe-list.php';
                            exit;
                        }
                    }
                } 
            }
            header("Location: /MealPlan/recipe?action=search");
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