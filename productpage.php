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
            include "header.php";
            ?>

            <?php
            include "navigator.php";
            ?>

            <div class="content">
                <?php echo "Product : " . htmlspecialchars($_GET["product"]) . '!';?>
                <div class="pictures"></div>
                <div class=""></div>
            </div>

            <?php
            include "footer.php";
            ?>
        </div>
    </body>
</html>
