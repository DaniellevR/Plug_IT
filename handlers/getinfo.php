<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Category.php");
require_once($root . "/Plug_IT/models/Product.php");

$action = $_GET['action'];
//echo "ACTION : " . $action;

if ($action === 'editCategory') {
    $categoryId = $_GET["id"];
    $categoryModel = new Category();

// Find category
    $categories = $categoryModel->getCategories();
    $category;

    foreach ($categories as $cat) {
        if ($cat->id === $categoryId) {
            $category = $cat;
        }
    }

    echo '<div class="line"><label>Nieuwe naam:</label><div class="input"><input id="newname" type="text" name="newname" value="' . $category->name . '" required="true"></div></div>';
    echo '<div class="line"><label>Omschrijving:</label><div class="input"><input id="desc" type="text" name="category_description" value="' . $category->description . '" required="true"></div></div>';
    echo '<div class="line"><label>Ouder categorie:</label><div class="input"><select name="parent">';

// Get options parent
    if (is_null($category->parent)) {
        // Category has no parent
        echo '<option value="" selected>-</option>';
        foreach ($categories as $cat) {
            if (is_null($cat->parent)) {
                echo '<option value="' . $cat->id . '">' . $cat->name . '</option>';
            }
        }
    } else {
        // Category has a parent
        echo '<option value="">-</option>';
        foreach ($categories as $cat) {
            if (is_null($cat->parent)) {
                if ($category->parent === $cat->id) {
                    echo '<option value="' . $cat->id . '" selected>' . $cat->name . '</option>';
                } else {
                    echo '<option value="' . $cat->id . '">' . $cat->name . '</option>';
                }
            }
        }
    }

    echo '</select></div></div>';
    echo '<div class="line"><label>Foto categorie:</label><div class="input"><input type="file" accept="image/*" name="image" id="image" required="true"/></div></div>';

    $path = "../categories/";
    foreach (glob($path . $categoryId . '*') as $filename) {
        echo '<img src="' . substr($filename, 3) . '" class="image" />';
    }
} else if ($action === 'getProductsFromCategoryEditProduct') {
    $categoryId = $_GET["id"];
    $productModel = new Product();
    $products = $productModel->getProductsInCategory($categoryId);

    echo '<label>Productnaam:</label>';
    echo '<select id="products_edit" name="categoriesEdit" onchange=\'grabInfo(this, "getProductInfo", "contentDivEditProductPart2")\'>';
    foreach ($products as $product) {
        echo '<option value="' . $product->id . '">' . $product->name . '</option>';
    }
    echo '</select>';

    // Show first product
    if (sizeof($products) > 0) {
        $product = $products[0];
    }
} else if ($action === 'getProductsFromCategoryRemoveProduct') {
    $categoryId = $_GET["id"];
    $productModel = new Product();
    $products = $productModel->getProductsInCategory($categoryId);

    echo '<label>Productnaam:</label>';
    echo '<select name="productToRemove">';
    foreach ($products as $product) {
        echo '<option value="' . $product->id . '">' . $product->name . '</option>';
    }
    echo '</select>';
} else if ($action === 'getProductInfo') {
    $productId = $_GET["id"];
    $productModel = new Product();
    $product = $productModel->getProduct($productId);
    echo "TEST";
}
?>