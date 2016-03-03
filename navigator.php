<!doctype html>
<html>
    <?php
    //include "database.php";
    ?>
    <head>
        <meta charset="UTF-8">
        <script src="myscripts.js"></script> 
    </head>
    <body>
        <div class="side_content">
            <ul class="nav">
                <?php
                $db = new Database;
                $categories = $db->getCategories();

                echo "<li><a href='catalogue.php'>Catalogus</a></li>";

                $catalogue_catagories = array();
                $children = array();

                // Sort
                foreach ($categories as $cat) {
                    if ($cat->parent === '') {
                        $catalogue_catagories[] = $cat;
                    } else {
                        $children[] = $cat;
                    }
                }

                // Create list
                foreach ($catalogue_catagories as $cat) {
                    echo "<li><a href='category.php?cat=$cat->name'>$cat->name</a></li>";

                    echo "<ul>";
                    // Children
                    foreach ($children as $child) {
                        if ($child->parent === $cat->name) {
                            echo "<li><a href='category.php?cat=$child->name'>$child->name</a></li>";
                        }
                    }
                    echo "</ul>";
                }
                ?>

            </ul>
        </div>
    </body>
</html>