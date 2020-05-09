
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Candleu Cart.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"> 
    </head>
    <body>
        <?php 
            
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/header.php';
        ?>
        <main>
            <h2>My Cart.</h2>
            <?php
                foreach($_SESSION["incart"] as &$cartItem){
                    echo("loop");
                    echo("<div class=\"cartItem\">");
                    echo("<img src='".$cartItem['image']."_thumb.jpg' alt = '".$cartItem['name']." thumbnail'>");
                    echo("<h3>NAME:".$cartItem['name']."</h3>");
                    echo("<p>".$cartItem['price']."</p>");
                    echo("</div>");
                }
            ?>
            
        </main>

        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/footer.php';
        ?>
    </body>
</html>