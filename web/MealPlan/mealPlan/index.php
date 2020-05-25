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
        case 'verify':
            $date = filter_input(INPUT_POST, 'date');
            $dayOne = filter_input(INPUT_POST, 'dayOne');
            $dayTwo = filter_input(INPUT_POST, 'dayTwo');
            $dayThree = filter_input(INPUT_POST, 'dayThree');
            $dayFour = filter_input(INPUT_POST, 'dayFour');
            $dayFive = filter_input(INPUT_POST, 'dayFive');

            if(empty($date) || empty($dayOne) || empty($dayTwo) || empty($dayThree) || empty($dayFour) || empty($dayFive)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/add-meal-plan.php';
                exit; 
            }
            addMealPlan($date, $dayOne, $dayTwo, $dayThree, $dayFour, $dayFive);
            header("Location: /MealPlan/mealPlan/index.php?action=search");
        break;
        case 'edit':
            $message = getMealPlanListEdit();
            include '../view/edit-meal-plan-list.php';
        break;
        case 'delete':
            foreach( $_POST as $key => $val ) {
                $postId = filter_input(INPUT_POST, $key);
                if( strpos($key, 'menu') !== false) {
                    if(isset($_POST[$key])){
                        deleteMenu($postId);
                    }
                } 
            }
            header("Location: /MealPlan/mealPlan?action=search");
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