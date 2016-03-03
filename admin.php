<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include "database.php";

if (isset($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $file_ext = explode(".", $file_name);
    $file_ext = end($file_ext);

    $expensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }

    if (empty($errors) == true) {
        // db
        require_once 'Database.php';
        $db = new Database();
        $db->addCategory($_POST['categoryname'], $_POST['category_description'], $_POST['formParentCategories']);

        if (!is_dir("/images/")) {
            mkdir("/images/");
        }

        move_uploaded_file($file_tmp, "/images/" . $file_name);
    } else {
        print_r($errors);
    }
}
?>

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
                <h1>Admin</h1>
                <div class="categories">
                    <h2>Categorieën</h2>
                    <ul class="admin_list">
                        <?php
                        $db = new Database;
                        $categories = $db->getCategories();

                        $catalogue_catagories = array();
                        $children = array();

// Sort
                        foreach ($categories as $cat) {
                            if ($cat->parent  === '') {
                                $catalogue_catagories[] = $cat;
                            } else {
                                $children[] = $cat;
                            }
                        }

// Create list
                        foreach ($catalogue_catagories as $cat) {
                            echo "<li><strong>$cat->name )</strong>" . " $cat->description</li>";

                            echo "<ul>";
                            // Children
                            foreach ($children as $child) {
                                if ($child->parent === $cat->name) {
                                    echo "<li><strong>$child->name )</strong>" . " $child->description</li>";
                                }
                            }
                            echo "</ul>";
                        }
                        ?>
                    </ul>

                    <form action="" method="POST" enctype="multipart/form-data">
                        Categorienaam:<br/>
                        <input type="text" name="categoryname" required="true"><br/>
                        Omschrijving:<br/>
                        <input type="text" name="category_description" required="true"><br/>
                        Ouder categorie:<br/>
                        <select name="formParentCategories">
                            <option value="">-</option>
                            <?php
                            foreach ($catalogue_catagories as $cat) {
                                echo "<option value=$cat->name>$cat->name</option>";
                            }
                            ?>
                        </select><br/>
                        <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/><br/>
                        <input type="submit" value="Toevoegen">
                    </form>
                    <form>
                        Categorienaam:<br/>
                        <select name="Categories">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select><br/>
                        <input type="submit" value="Verwijderen">
                    </form>
                </div>

                <div class="products">
                    <h2>Producten</h2>
                    <ul class="admin_list">
                        <?php
                        $db = new Database;
                        $categories = $db->getCategories();

                        $catalogue_catagories = array();
                        $children = array();

// Sort
                        foreach ($categories as $cat) {
                            if ($cat->parent  === '') {
                                $catalogue_catagories[] = $cat;
                            } else {
                                $children[] = $cat;
                            }
                        }

// Create list
                        foreach ($catalogue_catagories as $cat) {
                            echo "<li><strong>$cat->name )</strong>" . " $cat->description</li>";

                            echo "<ul>";
                            // Children
                            foreach ($children as $child) {
                                if ($child->parent === $cat->name) {
                                    echo "<li><strong>$child->name )</strong>" . " $child->description</li>";
                                }
                            }
                            echo "</ul>";
                        }
                        ?>
                    </ul>

                    <form>
                        Productnaam:<br/>
                        <input type="text" name="productnaam" required="true"><br/>
                        Omschrijving:<br/>
                        <input type="text" name="product_omschrijving" required="true"><br/>
                        Prijs:<br/>
                        <input type="number" min="0.01" step="0.01" value="0.01" /><br/>
                        <!--<span class="currencyinput">€<input type="number" min="0.01" step="0.01" value="0.01" name="price"></span><br/>-->
                        <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/><br/>
                        <input type="submit" value="Toevoegen">
                    </form>
                    <form>
                        Categorienaam:<br/>
                        <select name="Categories">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select><br/>
                        <input type="submit" value="Verwijderen">
                    </form>
                </div>

                <div class="users">
                    <h2>Gebruikers</h2>
                    <form>
                        Gebruikersnaam:<br/>
                        <input type="text" name="username" required="true"><br/>
                        Type:<br/>
                        <select name="types">
                            <option value="User">Gebruiker</option>
                            <option value="Admin">Admin</option>
                        </select><br/>
                        Wachtwoord:<br/>
                        <input type="password" name="password" required="true"><br/>
                        Herhaal wachtwoord:<br/>
                        <input type="password" name="repeat_password" required="true"><br/>
                        <input type="submit" value="Toevoegen">
                    </form>
                </div>

                <div class="orders">
                    <h2>Orders</h2>
                    <form>
                        Gebruikersnaam:<br/>
                        <input type="text" name="username" required="true"><br/>
                        Type:<br/>
                        <select name="types">
                            <option value="User">Gebruiker</option>
                            <option value="Admin">Admin</option>
                        </select><br/>
                        Wachtwoord:<br/>
                        <input type="password" name="password" required="true"><br/>
                        Herhaal wachtwoord:<br/>
                        <input type="password" name="repeat_password" required="true"><br/>
                        <input type="submit" value="Toevoegen">
                    </form>
                </div>
            </div>

            <?php
            include "footer.php";
            ?>
        </div>
    </body>
</html>
