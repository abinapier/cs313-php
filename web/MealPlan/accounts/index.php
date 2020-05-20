<?php
    require_once '../library/connections.php';
    require_once '../model/meal-plan-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'login':
            include '../view/login.php';
        break;
        case 'register':
            include '../view/register';
        break;
        default:
            
    }
?>