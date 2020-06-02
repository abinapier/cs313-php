<?php
    //controller for shopping list
    session_start();
    require_once '../library/connections.php';
    require_once '../model/meal-plan-model.php';
    require_once '../model/shopping-list-model.php';


    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    }

    switch ($action){
        case 'view':
            if(isset($_SESSION['user_id'])){
                $message = getListItems();
                include '../view/view-shopping-list.php';
                exit;
            }
            $message = "You must log in before your shopping list.";
            include '../view/login.php';
        break;
        case 'edit':
            $message = getIngredientsEdit();
            include '../view/remove-items-shopping-list.php';
        break;
        case 'delete':
            foreach( $_POST as $key => $val ) {
                if( strpos($key, 'ingredient') !== false) {
                    if(isset($_POST[$key])){
                        removeIngredientFromList($_POST[$key]);
                    }
                } 
            }
            header("Location: /MealPlan/shoppingList?action=view");
        break;
        case 'add':
            $mealPlanSelect = getMealPlanSelect();
            include '../view/add-items-shopping-list.php';
        break;
        case 'addUpdate':
            $menuId = filter_input(INPUT_POST, 'menu', FILTER_SANITIZE_NUMBER_INT);
            $mealPlanSelect = getMealPlanSelect();
            $ingredientCheckBox = getIngredients($menuId);
            include '../view/add-items-shopping-list.php';
        break;
        case 'update':
            foreach( $_POST as $key => $val ) {
                if( strpos($key, 'ingredient') !== false) {
                    if(isset($_POST[$key])){
                        addIngredientToList($_POST[$key]);
                    }
                } 
            }
            header("Location: /MealPlan/shoppingList?action=view");
        break;
        default:
            
    }