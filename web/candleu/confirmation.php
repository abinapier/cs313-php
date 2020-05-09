<?php
    session_start();
    if(!(isset($_SESSION['incart']))){
        $_SESSION['incart'] = array();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Candleu Order Confirmation.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"> 
    </head>
    <body>
        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/header.php';
        ?>
        
        <main class="confirmation">
            <h2>Thank You.</h2>
            <h3>Your order has been sent.</h3>
            <h4>Order Summary:</h4>
            <?php
                $cost = 0;
                if(empty($_SESSION["incart"])){
                    echo("<p>No items ordered.</p>");
                }
                foreach($_SESSION["incart"] as $key => $cartItem){
                    echo("<div class=\"cartItem\">");
                    echo("<img src='images/".$cartItem['image']."_thumb.jpg' alt = '".$cartItem['name']." thumbnail'>");
                    echo("<h3>".$cartItem['name']."</h3>");
                    echo("<p>$".$cartItem['price']."</p>");
                    echo("</div>");
                    $cost = $cost + $cartItem['price'];
                }
                echo("<span class='cost'>Total: $".($cost+7)."</span>");
                $name = $street = $city = $zip= "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = test_input($_POST["name"]);
                    $street = test_input($_POST["street"]);
                    $city = test_input($_POST["city"]);
                    $zip= test_input($_POST["zip"]);
                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                echo("<p>Shipping to:</p>");
                echo("<p>".$name."<br>");
                echo($street."<br>");
                echo($city.", ".$_POST["state"]." ".$zip."</p>");
                unset($_SESSION['incart']);
            ?>
            
        </main>

        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/footer.php';
        ?>
    </body>
</html>