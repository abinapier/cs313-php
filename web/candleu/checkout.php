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
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/header.php';
        ?>
        <main>
            <h2>Checkout.</h2>
            <?php
                $total = 0;
                foreach($_SESSION["incart"] as $key => $cartItem){
                    $total = $total + $cartItem['price'];
                }

                echo("<span class='cost'>Subtotal: $".$total."</span>");
                echo("<span class='cost'>Shipping: $7.00</span>");
                $total = $total + 7;
                echo("<span class='cost'>Total: $".$total."</span>");
            ?>
            <form action="confirmation.php">
                <label>Name <input type="text" name="name"></label>
                <label>Street <input type="text" name="street"></label>
                <label>City <input type="text" name="city"></label>
                <label>State <select>
                    <option value="" disabled selected>Select state</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select></label>
                <label>Zip Code <input type="text" name="zip"></label>
                <input type="submit">Place Order</input>	
            </form>
            
        </main>

        <?php 
            include $_SERVER['DOCUMENT_ROOT'] . '/candleu/common/footer.php';
        ?>
    </body>
</html>