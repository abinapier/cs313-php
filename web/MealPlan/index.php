<?php
    //main controller for meal plan
    require_once 'library/connections.php';
    require_once 'model/meal-plan-model.php';


    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    }

    switch ($action){
        case 'temp':
        break;
        default:
            include 'view/home.php';
    }
