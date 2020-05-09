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
        <title>Candleu Checkout.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"> 
    </head>
    <body>
        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . 'candleu/common/header.php';
        ?>
        <main>
            <h2>Checkout.</h2>
            
        </main>

        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . 'candleu/common/footer.php';
        ?>
    </body>
</html>