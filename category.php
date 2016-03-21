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
                echo "Categorie : " . htmlspecialchars($_GET["cat"]);
                echo "Id : " . htmlspecialchars($_GET["id"]);
                include "database.php";

                $db = new Database;

                $categories = $db->getChildCategories($_GET["id"]);
                $products = $db->getProducts($_GET["cat"]);

                if ($categories != NULL) {
                    foreach ($categories as $cat) {
                        echo "<a href='category.php?cat=$cat->name&id=$cat->id'><div class='categoryThumbnail'>"
                        . "<img class='categoryImage' src='pix/category/" . $cat->id . ".jpg' alt='NO IMAGE' />"
                        . $cat->name . "</div></a>";
                    }
                }

                if ($products != NULL) {
                    foreach ($products as $product) {
                        echo "<a href='product.php?cat=$product->name&id=$product->id'><div class='categoryProductThumbnail'>"
                        . "<img class='categoryImage' src='pix/product/" . $product->id . ".jpg' alt='NO IMAGE' />"
                        . $product->name . "</div></a>";
                    }
                }

                $product_list = array();
                ?>
            </div>

            <?php
            include "footer.php";
            ?>
        </div>
    </body>
</html>
