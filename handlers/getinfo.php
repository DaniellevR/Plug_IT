<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Category.php");
require_once($root . "/Plug_IT/models/Product.php");
require_once($root . "/Plug_IT/models/User.php");
require_once($root . "/Plug_IT/models/Role.php");
require_once($root . "/Plug_IT/models/Address.php");

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
    echo '<div class="line"><label>Foto categorie:</label><div class="input"><input type="file" accept="image/*" name="image" id="image"/></div></div>';

    $path = "../assets/pix/categories/";
    foreach (glob($path . $categoryId . '.*') as $filename) {
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
} else if ($action === 'editUser') {
    $username = $_GET["id"];
    $userModel = new User();
    $users = $userModel->getUsers();
    $adresModel = new Address();
    $addresses = $adresModel->getAddresses();

    // Find the user
    $foundUser = NULL;
    foreach ($users as $user) {
        if ($user->username === $username) {
            $foundUser = $user;
        }
    }

    // Get the connected addresses
    $idsAddresses = $userModel->getIdsAddresses($username);

    echo '<h5>Persoonsgegevens</h5><label>Naam:</label><input type="text" name="firstnameEditUser" required="true" placeholder="Voornaam" value="' . $foundUser->firstname . '">';
    echo '<input type="text" name="prefixEditUser" required="true" placeholder="tv" value="' . $foundUser->prefix . '">';
    echo '<input type="text" name="lastnameEditUser" required="true" placeholder="Achternaam" value="' . $foundUser->lastname . '">';
    echo '<label>Email:</label><input type="text" name="emailEditUser" required="true" value="' . $foundUser->email . '">';
    echo '<label>Telefoonnummer:</label><input type="text" name="telephonenumberEditUser" required="true" value="' . $foundUser->telephonenumber . '">';

    // Find the addresses
    foreach ($addresses as $address) {
        if (in_array($address->id, $idsAddresses)) {
            echo '<h5>Adresgegevens</h5><label>Adres:</label>';
            echo '<input type="text" name="streetnameEditUser" required="true" placeholder="Straatnaam" value="' . $address->streetname . '">';
            echo '<input type="text" name="housenumberEditUser" required="true" placeholder="nr" value="' . $address->housenumber . '">';
            echo '<input type="text" name="housenumberSuffixEditUser" placeholder="tv" value="' . $address->housenumberSuffix . '">';
            echo '<label>Postcode:</label><input type="text" name="postalCodeEditUser" required="true" value="' . $address->postalCode . '">';
            echo '<label>Woonplaats:</label><input type="text" name="cityEditUser" required="true" value="' . $address->city . '">';
        }
    }

    echo '<h5>Accountgegevens</h5>';
    echo '<label>Rol:</label>';
    echo '<select name="rolesEditUser">';

    $roleModel = new Role();
    $roles = $roleModel->getRoles();
    foreach ($roles as $role) {
        if ($role->name === $foundUser->rolename) {
            echo '<option value="' . $role->name . '" selected>' . $role->name . '</option>';
        } else {
            echo '<option value="' . $role->name . '">' . $role->name . '</option>';
        }
    }
    echo '</select><label>Huidige wachtwoord:</label><input type="password" name="current_passwordEditUser">';
    echo '<label>Nieuwe Wachtwoord:</label><input type="password" name="passwordEditUser">';
    echo '<label>Herhaal nieuwe wachtwoord:</label><input type="password" name="repeat_passwordEditUser">';
}
?>