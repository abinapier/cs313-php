<?php
    session_start();
    require_once '../library/connections.php';
    require_once '../model/meal-plan-model.php';
    require_once '../model/accounts-model.php';

    
    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action');
    }

    switch ($action){
        case 'account':
            if(isset($_SESSION["user_id"])) {
                $message = "<p>Hi ".getName()."!</p>";
                include '../view/account.php';
                exit;
            }
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
        case 'logout':
            unset($_SESSION['user_id']);
            include '../view/login.php';
        break;
        case 'addAccount':
            include '../view/registration.php';
        break;
        case 'register':
            $clientName = filter_input(INPUT_POST, 'clientName');
            $clientEmail = filter_input(INPUT_POST, 'clientEmail');
            $clientPassword = filter_input(INPUT_POST, 'clientPassword');

            if(empty($clientName) || empty($clientEmail) || empty($clientPassword)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/register.php';
                exit; 
            }
            $regOutcome = register($clientName, $clientEmail, $clientPassword);
            if($regOutcome===1){
                $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
                include '../view/login.php';
                exit;
            }else{
                $message = "<p> Sorry $clientFirstname, but the registration failed. There is already an account with that email. Please try again.</p>";
                include '../view/registration.php';
                exit;
            }
            include '../view/register.php';
        break;
        default:
            
    }
?>