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
                $categories = $db->getCategories();

                $category_list = array();

                foreach ($categories as $cat) {
                    if ($cat->parent === null) {
                        echo "<a href='catalogue.php'><div class='categoryThumbnail'>"
                        . "<img class='categoryImage' src='pix/category" . $cat->id . ".jpg' alt='TODO' />"
                        . $cat->name . "</div></a>";
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
