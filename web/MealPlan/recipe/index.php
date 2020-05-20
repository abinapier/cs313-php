<?php
    require_once '../library/connections.php';
    require_once '../model/recipe-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'view':
            include '../view/view-recipe.php';
        break;
        case 'add':
            include '../view/add-recipe.php';
        break;
        case 'search':
            include '../view/search-recipebox.php';
        break;
        default:
            
    }
?>