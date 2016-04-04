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
 * Upload category
 * @author Daniëlle
 */
if (isset($_FILES['image'])) {
    // Image is given
    $errors = "";
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

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
        // db
        $categoryModel = new Category();

        // Check if category will be unique
        $count = $categoryModel->checkIfCategoryIsUnique($_POST['categoryname'], $_POST['parent']);
        
        if ($count == 0) {
            // Add category
            $generated_id = $categoryModel->addCategory($_POST['categoryname'], $_POST['category_description'], $_POST['parent']);

            // Create directory if it doesn't exist yet
            if (!is_dir("../assets/pix/categories/")) {
                mkdir("../assets/pix/categories/");
            }

            if ($generated_id > 0) {
                // Add image
                move_uploaded_file($file_tmp, "../assets/pix/categories/" . $generated_id . ".png");
            } else {
                // Upload failed
                $errors = $errors . "Er is een fout opgetreden bij het opslaan. Probeer het opnieuw.";
            }
        } else {
            $errors = $errors . "Ingevoerde gegevens bestaan al.";
        }
    }

    $_SESSION["errors"] = $errors;
} else {
    $_SESSION["errors"] = "Kon de categorie niet toevoegen.";
}

header("Location: /TEMP/gaststudent99/Plug_IT/index.php?page=AdminCategories");
?>