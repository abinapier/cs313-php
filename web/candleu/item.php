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
            include $_SERVER['DOCUMENT_ROOT'] . 'candleu/common/header.php';
        ?>
        <main>
            <?php
                $string = file_get_contents("/candleu/common/candleDetails.json");
                $json = json_decode($string, true);
                
                echo $json['candles'];
            ?>

            <h2>Shop.</h2>
        </main>

        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . 'candleu/common/footer.php';
        ?>
    </body>
</html>