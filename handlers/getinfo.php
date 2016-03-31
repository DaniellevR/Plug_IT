<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Category.php");
require_once($root . "/Plug_IT/models/Product.php");
require_once($root . "/Plug_IT/models/User.php");
require_once($root . "/Plug_IT/models/Role.php");
require_once($root . "/Plug_IT/models/Address.php");
require_once($root . "/Plug_IT/models/Supplier.php");

$action = $_GET['action'];

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

    echo '<div><label for="categoryNewName">Categorienaam</label><input type="text" id="categoryNewName" name="newname" required="true" value="' . $category->name . '"/></div>';
    echo '<div><label for="categoryNewDescription">Omschrijving</label><input type="text" id="categoryNewDescription" name="category_description" required="true" value="' . $category->description . '"/></div>';
    echo '<div><label for="categoriesParentEdit">Ouder categorie</label>';
    echo '<select type="text" id="categories_edit" id="categoriesParentEdit" name="parent" onchange="grabInfo(this, "editCategory", "contentDivEditCategory")">';

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

    echo '</select></div>';
    echo '<div><label for="imageEditCategory">Foto categorie</label><input type="file" accept="image/*" name="image" id="imageEditCategory" class="input_text" required="true"/></div>';

    $path = "../assets/pix/categories/";
    foreach (glob($path . $categoryId . '.*') as $filename) {
        echo '<img src="' . substr($filename, 3) . '" class="image" />';
    }

//echo '<div><img type="image" src="/Plug_IT/assets/pix/categories/{$cat->id}.png" class="image" /></div>';
}
//else if ($action === 'getProductsFromCategoryEditProduct') {
//    $categoryId = $_GET["id"];
//    $productModel = new Product();
//    $products = $productModel->getProductsInCategory($categoryId);
//
//    echo '<label>Productnaam:</label>';
//    echo '<select id="products_edit" name="categoriesEdit" onchange=\'grabInfo(this, "getProductInfo", "contentDivEditProductPart2")\'>';
//    foreach ($products as $product) {
//        echo '<option value="' . $product->id . '">' . $product->name . '</option>';
//    }
//    echo '</select>';
//
//    // Show first product
//    if (sizeof($products) > 0) {
//        $product = $products[0];
//    }
//}
else if ($action === 'getProductsFromCategoryRemoveProduct' || $action === 'getProductsFromCategoryEditProduct') {
    $categoryId = $_GET["id"];
    $productModel = new Product();
    $products = $productModel->getProductsInCategory($categoryId);

    if ($action === 'getProductsFromCategoryRemoveProduct') {
        echo '<div><label for="productToRemove">Productnaam</label>';
        echo '<select type="text" id="productToRemove" name="productToRemove">';
    } else {
        echo '<div><label for="productToEdit">Productnaam</label>';
        echo '<select type="text" id="productToEdit" name="productToEdit" onchange="grabInfo(this, "getProductsFromCategoryEditProduct", "contentDivEditProduct2");">';
    }

    foreach ($products as $product) {
        echo '<option value="' . $product->id . '">' . $product->name . '</option>';
    }

    echo '</select></div>';
    
    if ($action === 'getProductsFromCategoryEditProduct') {
        //
    }
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
} else if ($action === 'getSupplierInfo') {
    $suppliername = $_GET["id"];
    $supplierModel = new Supplier();
    $supplier = $supplierModel->getSupplier($suppliername);

    if ($suppliername == "") {
        echo '<label>Naam:</label><input type="text" name="suppliername" required="true" value="' . $supplier->name . '">';
        echo '<label>Email:</label><input type="email" name="email" required="true" value="' . $supplier->email . '">';
        echo '<label>Telefoonnummer:</label><input type="tel" name="telephonenumber" required="true" value="' . $supplier->telephonenumber . '">';
        echo '<label>Adres:</label><input type="text" name="streetname" required="true" placeholder="Straatnaam" value="' . $supplier->streetname . '">';
        echo '<input class="small_field" type="text" name="housenumber" required="true" placeholder="nr" value="' . $supplier->housenumber . '">';
        echo '<input class="small_field" type="text" name="housenumberSuffix" required="true" placeholder="tv" value="' . $supplier->housenumber_suffix . '">';
        echo '<label>Postcode:</label><input type="text" name="postalCode" required="true" value="' . $supplier->postalCode . '">';
        echo '<label>Woonplaats:</label><input type="text" name="city" required="true" value="' . $supplier->city . '">';
    } else {
        echo '<label>Naam:</label><input type="text" name="suppliername" required="true" value="' . $supplier->name . '" readonly>';
        echo '<label>Email:</label><input type="email" name="email" required="true" value="' . $supplier->email . '" readonly>';
        echo '<label>Telefoonnummer:</label><input type="tel" name="telephonenumber" required="true" value="' . $supplier->telephonenumber . '" readonly>';
        echo '<label>Adres:</label><input type="text" name="streetname" required="true" placeholder="Straatnaam" value="' . $supplier->streetname . '" readonly>';
        echo '<input class="small_field" type="text" name="housenumber" required="true" placeholder="nr" value="' . $supplier->housenumber . '" readonly>';
        echo '<input class="small_field" type="text" name="housenumberSuffix" required="true" placeholder="tv" value="' . $supplier->housenumber_suffix . '" readonly>';
        echo '<label>Postcode:</label><input type="text" name="postalCode" required="true" value="' . $supplier->postalCode . '" readonly>';
        echo '<label>Woonplaats:</label><input type="text" name="city" required="true" value="' . $supplier->city . '" readonly>';
    }
}
?>