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
require_once($root . "/models/Product.inc.php");
require_once($root . "/models/Supplier.inc.php");
require_once($root . "/models/Address.inc.php");

/**
 * Upload product
 * @author Daniëlle
 */
$errors = "";
$messages = "";

if (isset($_FILES['image'])) {
    // Image given
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
        // Productinfo
        $productname = $_POST['productname'];
        $shortDescription = $_POST['productSummaryShort'];
        $longDescription = $_POST['productSummaryLong'];
        $characteristics = $_POST['characteristics'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $amount = $_POST['amount'];
        $categoryId = $_POST['categoriesAddProduct'];

        // Supplier
        $existingSuppliername = $_POST['suppliersAddProduct'];
        $suppliername = $_POST['suppliername'];
        $email = $_POST['email'];
        $telephonenumber = $_POST['telephonenumber'];
        $streetname = $_POST['streetname'];
        $housenumber = $_POST['housenumber'];
        $housenumberSuffix = $_POST['housenumberSuffix'];
        $postalCode = $_POST['postalCode'];
        $city = $_POST['city'];

        // db
        $productModel = new Product();

        // Check if a new supplier is given
        if ($existingSuppliername == "") {
            $supplierModel = new Supplier();
            if ($supplierModel->checkIfSupplierExists($suppliername) == 0) {
                // Add address
                $addressModel = new Address();
                if ($addressModel->checkIfAddressExists($streetname, $housenumber, $city, $housenumberSuffix, $postalCode) == 0) {
                    // Add address
                    $addressId = $addressModel->addAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode);

                    if ($addressId > 0) {
                        // Add supplier
                        $supplierModel->addSupplier($suppliername, $addressId, $email, $telephonenumber);
                    } else {
                        $errors = $errors . "Fout opgetreden bij het opslaan van de leverancier.\r\nHet product kon niet toegevoegd worden.";
                    }
                }
            } else {
                $messages = $messages . "Ingevoerde leverancier bestond al.";
            }
        }

        // Check if there are any errors
        if ($errors == "") {
            // Check if product is unique
            $count = $productModel->checkIfProductIsUnique($productname, $suppliername);

            if ($count == 0) {
                // Add product
                $generated_id = $productModel->addProduct($productname, $shortDescription, $longDescription, $characteristics, $price, $brand, $suppliername, $amount, $categoryId);

                // Create directory if it doesn't exist yet
                if (!is_dir("../assets/pix/products/")) {
                    mkdir("../assets/pix/products/");
                }

                if ($generated_id > 0) {
                    // Add image
                    move_uploaded_file($file_tmp, "../assets/pix/products/" . $generated_id . ".png");
                } else {
                    // Upload failed
                    $errors = $errors . "Er is een fout opgetreden bij het opslaan. Probeer het opnieuw.\r\n";
                }
            } else {
                $errors = $errors . "Ingevoerde combinatie van productnaam en leverancier bestaat al.\r\nKon het product niet toevoegen.";
            }
        }
    }

    $_SESSION["errors"] = $errors;
    $_SESSION["messages"] = $messages;
} else {
    $_SESSION["errors"] = "Kon het product niet toevoegen.";
}

header("Location: /TEMP/gaststudent99/Plug_IT/index.php?page=AdminProducts");
?>