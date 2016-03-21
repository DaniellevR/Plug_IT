<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Plug IT</title>
    </head>
    <body>
        <div class="sitecontainer">
            <?php
            include "Database.php";
            include "header.php";
            include "navigator.php";
            ?>

            <div class="content">
                <?php
                $product = $db->getProduct($_GET["id"]);

                echo "<div class='productInfo'><div id='productTitle'><h2>" . $product->name .
                "</h2></div><div class='productImage'><img src='pix/product/"
                . $product->id . ".jpg' alt='NO IMAGE' /></div><div id='description'><p>"
                . $product->description . "</p></div><div id='productBuy'><p>€" . $product->price . "</p></div></div>";
                ?>
            </div>

            <?php
            include "footer.php";
            ?>
        </div>
    </body>
</html>
