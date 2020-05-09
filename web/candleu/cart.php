
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
        <title>Candleu Cart.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/addItem.js"></script>
    </head>
    <body>
        <?php 
            
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/header.php';
        ?>
        <main>
            <h2>My Cart.</h2>
            <?php
                if(empty($_SESSION["incart"])){
                    echo("<p>No items in cart.</p>");
                }
                foreach($_SESSION["incart"] as $key => $cartItem){
                    echo("<div class=\"cartItem\">");
                    echo("<img src='images/".$cartItem['image']."_thumb.jpg' alt = '".$cartItem['name']." thumbnail'>");
                    echo("<h3>".$cartItem['name']."</h3>");
                    echo("<p>$".$cartItem['price']."</p>");
                    echo("<button onclick=\"removeItemFromCart(".$key.")\">Remove From Cart</button>");
                    echo("</div>");
                }
            ?>

            <button onclick="location.href='checkout.php';">Checkout</button>
            <a href="index.php" title="back to browse">Keep Shopping</a>
            
        </main>

        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/footer.php';
        ?>
    </body>
</html>