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

            <div class="content">
                <?php
                include "database.php";

                $db = new Database;

                if (isset($_GET["cat"])) {
                    $categories = $db->getChildCategories($_GET["id"]);
                    $top = false;
                } else {
                    $categories = $db->getCategories();
                    $top = true;
                }

                if (isset($categories)) {
                    foreach ($categories as $cat) {
                        if ($top) {
                            if ($cat->parent == null) {
                                echo "<a href='catalogue.php?cat=$cat->name&id=$cat->id'><div class='categoryThumbnail'>"
                                . "<img class='categoryImage' src='pix/category/" . $cat->id . ".jpg' alt='NO IMAGE' />"
                                . $cat->name . "</div></a>";
                            }
                        } else {
                            echo "<a href='catalogue.php?cat=$cat->name&id=$cat->id'><div class='categoryThumbnail'>"
                            . "<img class='categoryImage' src='pix/category/" . $cat->id . ".jpg' alt='NO IMAGE' />"
                            . $cat->name . "</div></a>";
                        }
                    }
                }

                if (isset($_GET["id"])) {
                    $products = $db->getProducts($_GET["id"]);

                    if ($products != NULL) {
                        foreach ($products as $product) {
                            echo "<a href='productpage.php?id=$product->id'><div class='productThumbnail'>"
                            . "<img class='productImage' src='pix/product/" . $product->id . ".jpg' alt='NO IMAGE' />"
                            . "<div class='productName'><h4>" . $product->name . "</h4></div><div class='shortDescription'><p>" . $product->description . "</p></div>"
                            . "<div id='productBuy'><p>€" . $product->price . "</p></div></div></a>";
                        }
                    }
                }
                ?>
            </div>
            <?php
            include "footer.php";
            ?>
        </div>
    </body>
</html>
