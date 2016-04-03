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

$errors = "";

if (isset($_POST['productToEdit']) && isset($_POST['productnameEditProduct']) && isset($_POST['productSummaryShortEditProduct']) && isset($_POST['productSummaryLongEditProduct']) &&
        isset($_POST['characteristicsEditProduct']) && isset($_POST['priceEditProduct']) && isset($_POST['brandEditProduct']) && isset($_POST['amountEditProduct']) &&
        isset($_POST['categoriesEditProduct']) && isset($_POST['suppliersEditProduct']) && isset($_POST['suppliernameEditProduct']) && isset($_POST['emailEditProduct']) &&
        isset($_POST['telephonenumberEditProduct']) && isset($_POST['streetnameEditProduct']) && isset($_POST['housenumberEditProduct']) && isset($_POST['housenumberSuffixEditProduct']) &&
        isset($_POST['postalCodeEditProduct']) && isset($_POST['cityEditProduct'])) {
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

    // Supplier
    $existingSuppliername = $_POST['suppliersEditProduct'];
    $suppliername = $_POST['suppliernameEditProduct'];
    $email = $_POST['emailEditProduct'];
    $telephonenumber = $_POST['telephonenumberEditProduct'];
    $streetname = $_POST['streetnameEditProduct'];
    $housenumber = $_POST['housenumberEditProduct'];
    $housenumberSuffix = $_POST['housenumberSuffixEditProduct'];
    $postalCode = $_POST['postalCodeEditProduct'];
    $city = $_POST['cityEditProduct'];


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

//                        if ($ret <= 0) {
//                            $errors = $errors . "Fout opgetreden bij het opslaan van de leverancier.\r\nHet product kon niet toegevoegd worden.";
//                        }
                } else {
                    $errors = $errors . "Fout opgetreden bij het opslaan van de leverancier.\r\nHet product kon niet toegevoegd worden.";
                }
            }
        } else {
            $messages = $messages . "Ingevoerde leverancier bestond al.";
        }
    }

    $count = $productModel->checkIfProductIsUnique($productname, $suppliername);

    if ($count == 0) {
        $res = $productModel->editProduct($id, $productname, $shortDescription, $longDescription, $characteristics, $price, $brand, $suppliername, $amount, $categoryId);

        if ($res == 1) {
            if (isset($_FILES['image'])) {
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];

                if ($file_name != "" && $file_size != "" && $file_tmp != "" && $file_type != "") {

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

                        if (!is_dir("../assets/pix/products/")) {
                            mkdir("../assets/pix/products/");
                        }

                        $path = "../assets/pix/products/";
                        foreach (glob($path . $id . '*') as $filename) {
                            unlink(realpath($filename));
                        }

                        move_uploaded_file($file_tmp, "../assets/pix/products/" . $id . ".png");
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
    $errors = $errors . "Kon het product niet wijzigen.";
}

$_SESSION["errors"] = $errors;

header("Location: /Plug_IT/index.php?page=AdminProducts");
?>