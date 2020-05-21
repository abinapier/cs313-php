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

            $recipeOneId = getRecipeName($recipeArray[0]);
            $recipeTwoId = getRecipeName($recipeArray[1]);
            $recipeThreeId = getRecipeName($recipeArray[2]);
            $recipeFourId = getRecipeName($recipeArray[3]);
            $recipeFiveId = getRecipeName($recipeArray[4]);

            $recipeOneName = getRecipeName($recipeOneId);
            $recipeTwoName = getRecipeName($recipeTwoId);
            $recipeThreeName = getRecipeName($recipeThreeId);
            $recipeFourName = getRecipeName($recipeFourId);
            $recipeFiveName = getRecipeName($recipeFiveId);
            
            include '../view/view-meal-plan.php';
        break;
        case 'add':
            include '../view/add-meal-plan.php';
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