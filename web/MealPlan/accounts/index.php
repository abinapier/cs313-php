<?php
    //controller for accounts
    session_start();
    require_once '../library/connections.php';
    require_once '../model/meal-plan-model.php';
    require_once '../model/accounts-model.php';

    
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
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
            $clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $clientPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            

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
            exit;
        break;
        case 'addAccount':
            include '../view/register.php';
            exit;
        break;
        case 'register':
            $clientName = filter_input(INPUT_POST, 'clientName', FILTER_SANITIZE_STRING);
            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_STRING);
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

            if(empty($clientName) || empty($clientEmail) || empty($clientPassword)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/register.php';
                exit; 
            }
            
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
            
            
            $regOutcome = register($clientName, $clientEmail, $hashedPassword);
            
            if($regOutcome===1){
                $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
                include '../view/login.php';
                exit;
            }else{
                $message = "<p> Sorry, but the registration failed. There is already an account with that email. Please try again.</p>";
                include '../view/register.php';
                exit;
            }
            include '../view/register.php';
            break;
            default:
            
    }
