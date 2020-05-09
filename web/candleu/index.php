<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shop Candleu.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"> 
    </head>
    <body>
        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/header.php';
        ?>
        <main>
            <h2>Shop.</h2>
            <h3>Luxury Candles</h3>
            <?php
                include_once('common/itemClass.php');

                $candles = array();
                $candles[] = new Item("Black Spruce.", 15.99, "Enjoy the smell of the forest, if the forest was a luxury spa, that is. Warm and familiar, black spruce is the candle for you.", "blackspruce");
                $candles[] = new Item("Cactus.", 18.99, "A handformed candle, that looks just like your favorite catcus plants.", "cactus");
                $candles[] = new Item("Blue Mountains.", 19.99, "Enjoy the smell of the adventure. Bright, clean, and fresh. Hints of rain, musk, and grass", "bluemountains");
                $candles[] = new Item("Escape.", 22.99, "Escape from the everyday. Filled with scents to relax and calm.", "escape");
                $candles[] = new Item("Gardener.", 22.99, "There's floral, then there's FLORAL. This candle is the gardener. It knows all the best flowers.", "gardener");
                $candles[] = new Item("Gin and Tonic.", 22.99, "Manly to the extreme. Along with gin and tonic get hits of leather and musk.", "ginandtonic");
                $candles[] = new Item("Harmony.", 22.99, "Bring your mind and body in harmony. Citrus to invigorate the mind, lavendar to calm the body.", "harmony");
                $candles[] = new Item("L'Amour.", 22.99, "Imagine sitting in France, eating strawberries with your love. Fresh, fruity, and new.", "lamour");
                $candles[] = new Item("Mahogany.", 22.99, "Full bodied mahogany wood scent. Along with musk and tobacco, it's new, but it feels familiar.", "mahogany");
                $candles[] = new Item("New York City.", 22.99, "Don't worry, it doesn't smell like the city, just the adventure and drive that buzzes there.", "newyork");
                $candles[] = new Item("Recharge.", 22.99, "Citrus and almond blend to help recharge your mind.", "recharge");
                $candles[] = new Item("Sleep.", 22.99, "Lavendar and mint to help relax the mind and body for a restful night.", "sleep");
                
                foreach($candles as &$candle){
                    echo("<div class=\"item\">\n");
                    echo("<img src=\"images/".$candle->image."_thumb.jpg\" alt=\"".$candle->name." image\">" );
                    echo("<h4>".$candle->name."</h4>");
                    echo("<p>$".$candle->price."</p>");
                    echo("</div>");
                }
            ?>
        </main>

        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/footer.php';
        ?>
    </body>
</html>