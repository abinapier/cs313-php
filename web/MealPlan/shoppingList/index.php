<?php
    session_start();
    require_once '../library/connections.php';
    require_once '../model/meal-plan-model.php';
    require_once '../model/shopping-list-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
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
            include '../view/remove-items-shopping-list.php';
        break;
        case 'delete':

        break;
        case 'add':
            $mealPlanSelect = getMealPlanSelect();
            include '../view/add-items-shopping-list.php';
        break;
        case 'addUpdate':
            $menuId = filter_input(INPUT_POST, 'menu');
            $ingredientCheckBox = getIngredients($menuId);
            include '../view/add-items-shopping-list.php';
        break;
        case 'update':

        break;
        default:
            
    }
?>