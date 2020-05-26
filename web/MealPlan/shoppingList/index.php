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
            $mealPlanSelect = getMealPlanSelect();
            $ingredientCheckBox = getIngredients($menuId);
            include '../view/add-items-shopping-list.php';
        break;
        case 'update':
            foreach( $_POST as $key => $val ) {
                $postId = filter_input(INPUT_POST, $key);
                echo $postId;
                if( strpos($key, 'ingredient') !== false) {
                    if(isset($_POST[$key])){
                        addIngredientToList($postId);
                    }
                } 
            }
            header("Location: /MealPlan/shoppingList?action=view");
        break;
        default:
            
    }
?>