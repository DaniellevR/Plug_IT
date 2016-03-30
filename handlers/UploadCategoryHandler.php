<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/AdminController.php");
require_once($root . "/Plug_IT/models/Category.php");

if (isset($_FILES['image'])) {
    $errors = "";
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

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

        $count = $categoryModel->checkIfCategoryIsUnique($_POST['categoryname'], $_POST['parent']);
        
        if ($count == 0) {
            $generated_id = $categoryModel->addCategory($_POST['categoryname'], $_POST['category_description'], $_POST['parent']);

            if (!is_dir("../assets/pix/categories/")) {
                mkdir("../assets/pix/categories/");
            }

            if ($generated_id > 0) {
                move_uploaded_file($file_tmp, "../assets/pix/categories/" . $generated_id . ".png");
            } else {
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

header("Location: /Plug_IT/index.php?page=AdminCategories");
?>