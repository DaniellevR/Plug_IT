<?php
/*
*
* Webshop Plug IT
*
* Made by : Nigel Liebers and Danielle van Rooij
*
* Avans 's-Hertogenbosch 2016 (c)
*
*/

$root = "W:\Websites\TEMP\gaststudent99\Plug_IT";
require_once($root . "/controllers/AdminController.php");
require_once($root . "/models/Category.inc.php");

/**
 * Edit the category
 * @author Daniëlle
 */
$errors = "";
if (isset($_POST['categoriesEdit']) && isset($_POST['newname']) && isset($_POST['category_description']) && isset($_POST['parent'])) {
    $id = $_POST['categoriesEdit'];
    $name = $_POST['newname'];
    $description = $_POST['category_description'];
    $parent = $_POST['parent'];

    // Check if category will still be unique
    $categoryModel = new Category();
    $count = $categoryModel->checkIfCategoryIsUniqueWithId($id, $name, $parent);

    if ($count == 0) {
        // Edit the category
        $res = $categoryModel->editCategory($id, $name, $description, $parent);

        if ($res == 1) {
            if (isset($_FILES['image'])) {
                // New image given
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];

                if ($file_name != "" && $file_size != "" && $file_tmp != "" && $file_type != "") {
                    // Check for errors
                    $file_ext = explode(".", $file_name);
                    $file_ext = end($file_ext);

                    $expensions = array("jpeg", "jpg", "png");

                    if (in_array($file_ext, $expensions) === false) {
                        $errors = "Extensie niet toegestaan. Kies een jpeg, jpg of png afbeelding.\r\n";
                    }

                    if ($file_size > 2097152) {
                        $errors = $errors . 'Afbeelding mag niet groter zijn dan 2MB.\r\n';
                    }

                    if ($errors === "") {
                        // Create directory if it doesn't exist
                        if (!is_dir("../assets/pix/categories/")) {
                            mkdir("../assets/pix/categories/");
                        }

                        // Remove old picture
                        $path = "../assets/pix/categories/";
                        foreach (glob($path . $id . '*') as $filename) {
                            unlink(realpath($filename));
                        }

                        // Add new picture
                        move_uploaded_file($file_tmp, "../assets/pix/categories/" . $id . ".png");
                    }
                }
            }
        } else {
            $errors = $errors . "Er is een fout opgetreden bij het opslaan. Probeer het opnieuw.";
        }
    } else {
        $errors = $errors . "Ingevoerde gegevens bestaan al.";
    }
} else {
    $errors = $errors . "Kon de categorie niet wijzigen.";
}

$_SESSION["errors"] = $errors;

header("Location: /TEMP/gaststudent99/Plug_IT/index.php?page=Admin");
?>