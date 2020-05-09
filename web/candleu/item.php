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
        <title></title>
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
            <?php
                $string = file_get_contents($_SERVER['DOCUMENT_ROOT']."/candleu/common/candleDetails.json");
                $json = json_decode($string, true);

                $name = $_GET["name"];
                $price = floatval($_GET["price"]);
                $image = $_GET["image"];

                foreach ($json['candles'] as &$candle){
                    if(strcmp($candle["name"], $name) == 0){
                        $description = $candle["details"];
                    }
                }

    
                echo("<h2>".$name."</h2>");
                echo("<div class='itemDiv'>");
                echo("<img src=\"images/".$image.".jpg\" alt=\"".$name." image\">");
                echo("<div>");
                echo("<p><span class=\"price\">$".$price."</span></p>");
                echo("<p>".$description."</p>");
                $link = $_SERVER['REQUEST_URI'];
                echo("<button onclick=\"addItemToCart('".$name."', ".$price.", '".$image."', '".$link."')\">Add To Cart</button>");
                echo("</div>");
                echo("</div>");
            ?>
            <a href="index.php" title="back to browse">Keep Shopping</a>
        </main>
        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/footer.php';
        ?>
    </body>
</html>