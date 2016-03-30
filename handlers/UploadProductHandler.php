<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/AdminController.php");
require_once($root . "/Plug_IT/models/Product.php");
require_once($root . "/Plug_IT/models/Supplier.php");
require_once($root . "/Plug_IT/models/Address.php");

if (isset($_FILES['image'])) {
    $errors = "";
    $messages = "";
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
                        if ($supplierModel->addSupplier($suppliername, $addressId, $email, $telephonenumber) <= 0) {
                            $errors = $errors . "Fout opgetreden bij het opslaan van de leverancier.\r\nHet product kon niet toegevoegd worden.";
                        }
                    } else {
                        $errors = $errors . "Fout opgetreden bij het opslaan van de leverancier.\r\nHet product kon niet toegevoegd worden.";
                    }
                }
            } else {
                $messages = $messages . "Ingevoerde leverancier bestond al.";
            }
        }

        if ($errors == "") {            
            $count = $productModel->checkIfProductIsUnique($productname, $suppliername);

            if ($count == 0) {
                $generated_id = $productModel->addProduct($productname, $shortDescription, $longDescription, $characteristics, $price, $brand, $suppliername, $amount, $categoryId);

                if (!is_dir("../assets/pix/products/")) {
                    mkdir("../assets/pix/products/");
                }

                if ($generated_id > 0) {
                    move_uploaded_file($file_tmp, "../assets/pix/products/" . $generated_id . ".png");
                } else {
                    $errors = $errors . "Er is een fout opgetreden bij het opslaan. Probeer het opnieuw.\r\n";
                }
            } else {
                $errors = $errors . "Ingevoerde combinatie van productnaam en leverancier bestaan al.\r\nKon het product niet toevoegen.";
            }
        }
    }

    $_SESSION["errors"] = $errors;
} else {
    $_SESSION["errors"] = "Kon het product niet toevoegen.";
}

header("Location: /Plug_IT/index.php?page=AdminProducts");
?>