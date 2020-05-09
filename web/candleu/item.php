<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"> 
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
                echo $name;
                $price = floatval($_GET["price"]);
                $image = $_GET["image"].".jpg";
                $description = "no match";

                foreach ($json['candles'] as &$candle){
                    if(strcmp($candle["name"], $name) == 0){
                        $description = $candle["description"];
                    }
                }

                echo $description;
            ?>

            <h2>Shop.</h2>
        </main>

        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/footer.php';
        ?>
    </body>
</html>