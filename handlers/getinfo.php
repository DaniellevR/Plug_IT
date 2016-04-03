<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Category.inc.php");
require_once($root . "/Plug_IT/models/Product.inc.php");
require_once($root . "/Plug_IT/models/User.inc.php");
require_once($root . "/Plug_IT/models/Role.inc.php");
require_once($root . "/Plug_IT/models/Address.inc.php");
require_once($root . "/Plug_IT/models/Supplier.inc.php");

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
            break;
        }
    }

    // Find children
    $children = "";
    foreach ($categories as $cat) {
        if ($cat->parent === $category->id) {
            $children = "yes";
            break;
        }
    }

    echo '<div><label for="categoryNewName">Categorienaam</label><input type="text" id="categoryNewName" name="newname" required="true" value="' . $category->name . '"/></div>';
    echo '<div><label for="categoryNewDescription">Omschrijving</label><input type="text" id="categoryNewDescription" name="category_description" required="true" value="' . $category->description . '"/></div>';
    echo '<div><label for="categoriesParentEdit">Ouder categorie</label>';

    if (is_null($category->parent) && $children !== "") {
        echo '<select type="text" id="categories_edit" id="categoriesParentEdit" name="parent" onchange="grabInfo(this, "editCategory", "contentDivEditCategory")" disabled>';
    } else {
        echo '<select type="text" id="categories_edit" id="categoriesParentEdit" name="parent" onchange="grabInfo(this, "editCategory", "contentDivEditCategory")">';
    }

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
    echo '<div><label for="imageEditCategory">Foto categorie</label><input type="file" accept="image/*" name="image" id="imageEditCategory" class="input_text"/></div>';

    $path = "../assets/pix/categories/";
    foreach (glob($path . $categoryId . '.*') as $filename) {
        echo '<img src="' . substr($filename, 3) . '" class="image" />';
    }
} else if ($action === 'getProductsFromCategoryRemoveProduct' || $action === 'getProductsFromCategoryEditProduct') {
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

    echo '<div><h5>Persoonsgegevens</h5></div>';
    echo '<div><label for="firstname">Name</label><input type="text" id="firstname" name="firstnameEditUser" required="true" placeholder="Voornaam" value="' . $foundUser->firstname . '"></div>';
    echo '<div><label></label><input type="text" id="prefix" name="prefixEditUser" placeholder="Tussenvoegsel" value="' . $foundUser->prefix . '"></div>';
    echo '<div><label></label><input type="text" id="lastname" name="lastnameEditUser" required="true" placeholder="Achternaam" value="' . $foundUser->lastname . '"></div>';
    echo '<div><label for="email">Email</label><input type="email" name="emailEditUser" id="email"  required="true" value="' . $foundUser->email . '"/></div>';
    echo '<div><label for="telephonenumber">Telefoonnummer</label><input type="text" id="telephonenumber" name="telephonenumberEditUser" required="true" value="' . $foundUser->telephonenumber . '"></div>';

    // Find the addresses
    foreach ($addresses as $address) {
        if (in_array($address->id, $idsAddresses)) {
            echo '<div><h5>Adresgegevens</h5></div>';
            echo '<div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameEditUser" required="true" placeholder="Straatnaam" value="' . $address->streetname . '"></div>';
            echo '<div><label></label><input type="text" name="housenumberEditUser" required="true" placeholder="Huisnummer" value="' . $address->housenumber . '"></div>';
            echo '<div><label></label><input type="text" name="housenumberSuffixEditUser" placeholder="Huisnummertoevoeging" value="' . $address->housenumberSuffix . '"></div>';
            echo '<div><label for="postalCode">Postcode</label><input type="text" name="postalCodeEditUser" required="true" value="' . $address->postalCode . '"></div>';
            echo '<div><label for="city">Woonplaats</label><input type="text" name="cityEditUser" required="true" value="' . $address->city . '"></div>';
        }
    }

    echo '<div><h5>Accountgegevens</h5></div>';
    echo '<div>';

    $roleModel = new Role();
    $roles = $roleModel->getRoles();

    if (isset($_SESSION["usertype"])) {
        if ($_SESSION["usertype"] === 'Administrator') {
            echo '<label>Rol</label><select type="text" name="rolesEditUser">';
            foreach ($roles as $role) {
                if ($role->name === $foundUser->rolename) {
                    echo '<option value="' . $role->name . '" selected>' . $role->name . '</option>';
                } else {
                    echo '<option value="' . $role->name . '">' . $role->name . '</option>';
                }
            }
            echo '</select></div>';
        } else {
            echo '<input type="text" name="rolesEditUser" value="User" required="true" hidden="true">';
        }
    } else {
        echo '<input type="text" name="rolesEditUser" value="User" required="true" hidden="true">';
    }

    echo '<div><label for="usernameEditUser">Gebruikersnaam</label><input type="text" id="usernameEditUser" name="usernameEditUser" readonly value="' . $username . '"></div>';
    echo '<div><label for="passwordEditUser">Huidige wachtwoord</label><input type="password" id="passwordEditUser" name="passwordEditUser"></div>';
    echo '<div><label for="newPasswordEditUser">Nieuwe wachtwoord</label><input type="password" id="newPasswordEditUser" name="newPasswordEditUser"></div>';
    echo '<div><label for="repeat_passwordEditUser">Herhaal wachtwoord</label><input type="password" id="repeat_passwordEditUser" name="repeat_passwordEditUser"></div>';
} else if ($action === 'getSupplierInfo') {
    $suppliername = $_GET["id"];
    $supplierModel = new Supplier();
    $supplier = $supplierModel->getSupplier($suppliername);

    if ($suppliername == "") {
        echo '<div><label>Naam:</label><input type="text" name="suppliername" required="true" value="' . $supplier->name . '"></div>';
        echo '<div><label>Email:</label><input type="email" name="email" required="true" value="' . $supplier->email . '">';
        echo '<div><label>Telefoonnummer:</label><input type="tel" name="telephonenumber" required="true" value="' . $supplier->telephonenumber . '"></div>';
        echo '<div><label>Adres:</label><input type="text" name="streetname" required="true" placeholder="Straatnaam" value="' . $supplier->streetname . '"></div>';
        echo '<div><label></label><input class="small_field" type="text" name="housenumber" required="true" placeholder="Huisnummer" value="' . $supplier->housenumber . '"></div>';
        echo '<div><label></label><input class="small_field" type="text" name="housenumberSuffix" required="true" placeholder="Huisnummertoevoeging" value="' . $supplier->housenumber_suffix . '"></div>';
        echo '<div><label>Postcode:</label><input type="text" name="postalCode" required="true" value="' . $supplier->postalCode . '"></div>';
        echo '<div><label>Woonplaats:</label><input type="text" name="city" required="true" value="' . $supplier->city . '"></div>';
    } else {
        echo '<div><label>Naam:</label><input type="text" name="suppliername" required="true" value="' . $supplier->name . '" readonly></div>';
        echo '<div><label>Email:</label><input type="email" name="email" required="true" value="' . $supplier->email . '" readonly></div>';
        echo '<div><label>Telefoonnummer:</label><input type="tel" name="telephonenumber" required="true" value="' . $supplier->telephonenumber . '" readonly></div>';
        echo '<div><label>Adres:</label><input type="text" name="streetname" required="true" placeholder="Straatnaam" value="' . $supplier->streetname . '" readonly></div>';
        echo '<div><label></label><input class="small_field" type="text" name="housenumber" required="true" placeholder="Huisnummer" value="' . $supplier->housenumber . '" readonly></div>';
        echo '<div><label></label><input class="small_field" type="text" name="housenumberSuffix" required="true" placeholder="Huisnummertoevoeging" value="' . $supplier->housenumber_suffix . '" readonly></div>';
        echo '<div><label>Postcode:</label><input type="text" name="postalCode" required="true" value="' . $supplier->postalCode . '" readonly></div>';
        echo '<div><label>Woonplaats:</label><input type="text" name="city" required="true" value="' . $supplier->city . '" readonly></div>';
    }
}
?>