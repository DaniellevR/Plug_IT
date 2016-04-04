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

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/AdminController.php");
require_once($root . "/Plug_IT/models/Product.inc.php");
require_once($root . "/Plug_IT/models/Supplier.inc.php");
require_once($root . "/Plug_IT/models/Address.inc.php");

/**
 * Edit the product
 * @author Daniëlle
 */
if (isset($_FILES['image'])) {
    // New image is given
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
            // Create directory if it doesn't exist yet
            if (!is_dir("../assets/pix/products/")) {
                mkdir("../assets/pix/products/");
            }

            // Remove old picture
            $path = "../assets/pix/products/";
            foreach (glob($path . $id . '*') as $filename) {
                unlink(realpath($filename));
            }

            // Add new picture
            move_uploaded_file($file_tmp, "../assets/pix/products/" . $id . ".png");
        }
    }
}

$errors = "";
if (isset($_POST['productToEdit']) && isset($_POST['productnameEditProduct']) && isset($_POST['productSummaryShortEditProduct']) && isset($_POST['productSummaryLongEditProduct']) &&
        isset($_POST['characteristicsEditProduct']) && isset($_POST['priceEditProduct']) && isset($_POST['brandEditProduct']) && isset($_POST['amountEditProduct']) &&
        isset($_POST['categoriesEditProduct'])) {
    // Productinfo
    $productId = $_POST['productToEdit'];
    $productname = $_POST['productnameEditProduct'];
    $shortDescription = $_POST['productSummaryShortEditProduct'];
    $longDescription = $_POST['productSummaryLongEditProduct'];
    $characteristics = $_POST['characteristicsEditProduct'];
    $price = $_POST['priceEditProduct'];
    $brand = $_POST['brandEditProduct'];
    $amount = $_POST['amountEditProduct'];
    $categoryId = $_POST['categoriesEditProduct'];

    // db
    $productModel = new Product();
    $foundProduct = $productModel->getProduct($productId);
    
    $file = fopen("C://testje.txt", "w");
    fwrite($file, $productId . " ; " . $productname . " ; " . $shortDescription . " ; " . $longDescription . " ; " . $characteristics . " ; " . $price . " ; " . $brand . " ; " . $foundProduct->supplier . " ; " . $amount . " ; " . $categoryId);
    fclose($file);

    // Edit the product
    $res = $productModel->editProduct($productId, $productname, $shortDescription, $longDescription, $characteristics, $price, $brand, $foundProduct->supplier, $amount, $categoryId);

    if ($res != 1) {
        $errors = $errors . "Er is een fout opgetreden bij het opslaan. Probeer het opnieuw.";
    }
} else {
    $errors = $errors . "Ingevoerde gegevens bestaan al.";
}

$_SESSION["errors"] = $errors;

header("Location: /Plug_IT/index.php?page=AdminProducts");
?>