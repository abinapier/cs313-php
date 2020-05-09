<?php
session_start();
    if(isset($_POST['function2call']) && !empty($_POST['function2call'])) {
        $function2call = $_POST['function2call'];
        switch($function2call) {
            case 'addToCart' : addToCart($_POST['name'], $_POST['price'], $_POST['image'], $_POST['link']);break;
            case 'removeFromCart' : removeFromCart($_POST['key']);break;
            // other cases
        }
    }

    function addToCart($name, $price, $image, $link){
        array_push($_SESSION["incart"], ["name"=>$name, "price"=>$price, "image"=>$image, "link"=>$link]);
    }

    function removeFromCart($key){
        unset($_SESSION['incart'][$key]);
    }
?>