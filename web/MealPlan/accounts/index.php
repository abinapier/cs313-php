<?php
    require_once '../library/connections.php';
    require_once '../model/meal-plan-model.php';
    require_once '../model/accounts-model.php';


    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'account':
            include '../view/login.php';
        break;
        case 'login':
            $clientEmail = filter_input(INPUT_POST, 'email');
            $clientPassword = filter_input(INPUT_POST, 'password');

            if(empty($clientEmail)||empty($clientPassword)){
                $message = '<p>Please provide your email and password.</p>';
                include '../view/login.php';
                exit;
            }
            
            if(login($clientEmail, $clientPassword)==1){
                
                $userName = getName();
                $message = "<p>Thanks $userName, you are logged in.</p>";
                include '../view/thank-you.php';
                exit;
            }else{
                $message = "<p>Email or password doesn't match.</p>";
                include '../view/login.php';
                exit;
            }
        break;
        case 'register':
            include '../view/register.php';
        break;
        default:
            
    }
?>