<?php
    require_once '../library/connections.php';
    require_once '../model/shopping-list-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'view':
            include '../view/view-shopping-list.php';
        break;
        default:
            
    }
?>