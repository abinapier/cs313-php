<?php
    require_once '../library/connections.php';
    require_once '../model/meal-plan-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'view':
            include '../view/view-meal-plan.php';
        break;
        case 'add':
            include '../view/add-meal-plan.php';
        break;
        case 'search':
            include '../view/search-meal-plans.php';
        break;
        default:
            
    }
?>