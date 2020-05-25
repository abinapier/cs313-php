<?php
    session_start();
    require_once '../library/connections.php';
    require_once '../model/meal-plan-model.php';
    require_once '../model/recipe-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'view':
            
            $menuID = filter_input(INPUT_GET, 'id');
            $date = getMealPlanDate($menuID);
            $recipeArray = getMenuRecipes($menuID);
            
            $recipeOneId = $recipeArray[0];
            $recipeTwoId = $recipeArray[1];
            $recipeThreeId = $recipeArray[2];
            $recipeFourId = $recipeArray[3];
            $recipeFiveId = $recipeArray[4];
            
            $recipeOneName = getRecipeName($recipeOneId);
            $recipeTwoName = getRecipeName($recipeTwoId);
            $recipeThreeName = getRecipeName($recipeThreeId);
            $recipeFourName = getRecipeName($recipeFourId);
            $recipeFiveName = getRecipeName($recipeFiveId);

            include '../view/view-meal-plan.php';
        break;
        case 'add':
            $recipeSelect = getRecipeSelect();
            include '../view/add-meal-plan.php';
        break;
        case 'edit':
        break;
        case 'delete':
        break;
        case 'search':
            if(isset($_SESSION['user_id'])){
                $message = getMealPlans();
                include '../view/search-meal-plans.php';
                exit;
            }
            $message = "You must log in before you can access meal plans.";
            include '../view/login.php';
        break;
        default:
            
    }
?>