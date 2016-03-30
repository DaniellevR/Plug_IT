<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/AdminController.php");
require_once($root . "/Plug_IT/models/Product.php");

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
        $productModel = new Product();
        $generated_id = $productModel->addProduct($_POST['categoryname'], $_POST['category_description'], $_POST['parent']);

        if (!is_dir("../assets/pix/products/")) {
            mkdir("../assets/pix/products/");
        }

        move_uploaded_file($file_tmp, "../assets/pix/products/" . $generated_id . "." . $file_ext);
    } else {
        print_r($errors);
    }
}

header("Location: /Plug_IT/index.php?page=Admin");
?>