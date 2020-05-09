<?php
    if(isset($_POST['function2call']) && !empty($_POST['function2call'])) {
        $function2call = $_POST['function2call'];
        switch($function2call) {
            case 'addToCart' : addToCart($_POST['name'], $_POST['price'], $_POST['image'], $_POST['link']);break;
            case 'other' : echo("Not added.");break;
            // other cases
        }
    }

    function addToCart($name, $price, $image, $link){
        $_SESSION["incart"] = ["name"=>$name, "price"=>$price, "image"=>$image, "link"=>$link];
        echo($_SESSION["incart"]);
    }
?>