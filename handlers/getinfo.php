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
require_once($root . "/Plug_IT/models/Category.inc.php");
require_once($root . "/Plug_IT/models/Product.inc.php");
require_once($root . "/Plug_IT/models/User.inc.php");
require_once($root . "/Plug_IT/models/Role.inc.php");
require_once($root . "/Plug_IT/models/Address.inc.php");
require_once($root . "/Plug_IT/models/Supplier.inc.php");
require_once($root . "/Plug_IT/models/Order.inc.php");

/**
 * Get info for the request in the views
 * @author Daniëlle
 */
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
} else if ($action === 'getProductsFromCategoryRemoveProduct' || $action === 'getProductsFromCategoryEditProduct' || $action === 'getProductsFromCategoryAddOrder') {
    $categoryId = $_GET["id"];
    $productModel = new Product();
    $products = $productModel->getProductsInCategory($categoryId);

    if ($action === 'getProductsFromCategoryRemoveProduct') {
        echo '<div><label for="productToRemove">Productnaam</label>';
        echo '<select type="text" id="productToRemove" name="productToRemove">';
    } else if ($action === 'getProductsFromCategoryEditProduct') {
        echo '<div><label for="productToEdit">Productnaam</label>';
//        echo '<select type="text" id="productToEdit" name="productToEdit" onchange="grabInfo(this, "getProductAndSupplierInfoEditProduct", "contentDivEditProduct2");">';
        echo '<select type="text" id="productToEdit" name="productToEdit" onchange="grabInfo(this, "getProductAndSupplierInfoEditProduct", "contentDivEditProduct2")">';
    } else {
        echo '<div><label for="productslist">Productnaam</label><select type="text" id="productslist" name="productslist">';
    }

    foreach ($products as $product) {
        echo '<option value="' . $product->id . '">' . $product->name . '</option>';
    }

    echo '</select></div>';

    if ($action === 'getProductsFromCategoryEditProduct') {
        echo '<div><h4>Productinformatie</h4></div>';
        productInfo($products[0]->id);
        echo '<div><h4>Leverancier</h4></div>';
        supplierInfo($products[0]->supplier);
    } else if ($action === 'getProductsFromCategoryAddOrder') {
        echo '<div><label for="amount">Aantal</label><input type="number" min="1" step="1" value="1" name="amount" required="true"></div>';
    }
} else if ($action === 'getProductAndSupplierInfoEditProduct') {
// Productinfo
    $productId = $_GET["id"];
    echo '<div><h4>Productinformatie</h4></div>';
    $suppliername = productInfo($productId);

// Supplier info
    echo '<div><h4>Leverancier</h4></div>';
    supplierInfo($suppliername);
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
    supplierInfo($suppliername);
} else if ($action === 'getStatesEditOrder') {
    $orderstate = $_GET["id"];
    $orderModel = new Order();
    $states = $orderModel->getStates();

    echo '<label>Status</label><select type="text" name="statesEditOrder">';
    foreach ($states as $state) {
        if ($state === $orderstate) {
            echo '<option value="' . $state . '" selected>' . $state . '</option>';
        } else {
            echo '<option value="' . $state . '">' . $state . '</option>';
        }
    }
    echo '</select>';
} else if ($action === 'getAddressesUsername') {
    $username = $_GET["id"];
    addressInfo($username);
}

/**
 * Get product info belonging to the given product id
 * @param type $productId
 * @return type
 */
function productInfo($productId) {
    $productModel = new Product();
    $product = $productModel->getProduct($productId);

    echo '<div><label for="productname">Productnaam</label><input type="text" name="productnameEditProduct" id="productname" required="true" value="' . $product->name . '"></div>';
    echo '<div><label for="productSummaryShort">Korte omschrijving</label><textarea type="text" id="productSummaryShort" name="productSummaryShortEditProduct"  maxlength="200" required="true">' . $product->shortDescription . '</textarea></div>';
    echo '<div><label for="productSummaryLong">Lange omschrijving</label><textarea type="text" id="productSummaryLong" name="productSummaryLongEditProduct" class="longdescription" required="true">' . $product->description . '</textarea></div>';
    echo '<div><label for="characteristics">Kenmerken</label><input type="text" id="characteristics" name="characteristicsEditProduct" required="true" placeholder="Kenmerk, Kenmerk, Kenmerk" value="' . $product->characteristics . '"></div>';
    echo '<div><label for="price">Prijs</label><input type="number" id="price" name="priceEditProduct" min="0.01" step="0.01" value="' . $product->price . '"/></div>';
    echo '<div><label for="brand">Merk</label><input type="text" id="brand" name="brandEditProduct" required="true" value="' . $product->brand . '"></div>';
    echo '<div><label for="amountEditProduct">Aantal op voorraad</label><input type="number" min="1" step="1" name="amountEditProduct" required="true" value="' . $product->amount . '"></div>';
    echo '<div><label for = "categoriesEditProduct">Categorienaam</label><select type = "text" id = "categoriesAddProduct" id = "categoriesAddProduct" name = "categoriesAddProduct">';

    $categoryModel = new Category();
    $categories = $categoryModel->getCategories();

    foreach ($categories as $category) {
        if (is_null($category->parent)) {
            if ($product->categoryId === $category->id) {
                echo '<option class = "category" value = "' . $category->id . '" selected>';
            } else {
                echo '<option class = "category" value = "' . $category->id . '">';
            }

            foreach ($categories as $category2) {
                if ($category2->parent === $category->id) {
                    if ($product->categoryId === $category2->id) {
                        echo '<option class = "subcategory" value = "' . $category2->id . '" selected>';
                    } else {
                        echo '<option class = "subcategory" value = "' . $category2->id . '">';
                    }
                }
            }
        }
    }

    echo '</select></div>';
    echo '<div><label for = "image">Foto categorie</label><input type = "file" accept = "image/*" name = "image" id = "image" class = "input_text"/></div>';
    echo '<div><img type = "image" src = "/Plug_IT/assets/pix/products/' . $product->id . '.png" class = "image" /></div>';

    return $product->supplier;
}

/**
 * Get supplier info of given suppliername
 * @param type $suppliername
 */
function supplierInfo($suppliername) {
    $supplierModel = new Supplier();
    $supplier = $supplierModel->getSupplier($suppliername);

    if ($suppliername == "") {
        echo '<div><label>Naam:</label><input type="text" name="suppliername" required="true" value="' . $supplier->name . '"></div>';
        echo '<div><label>Email:</label><input type="email" name="email" required="true" value="' . $supplier->email . '">';
        echo '<div><label>Telefoonnummer:</label><input type="tel" name="telephonenumber" required="true" value="' . $supplier->telephonenumber . '"></div>';
        echo '<div><label>Adres:</label><input type="text" name="streetname" required="true" placeholder="Straatnaam" value="' . $supplier->streetname . '"></div>';
        echo '<div><label></label><input class="small_field" type="text" name="housenumber" required="true" placeholder="Huisnummer" value="' . $supplier->housenumber . '"></div>';
        echo '<div><label></label><input class="small_field" type="text" name="housenumberSuffix" placeholder="Huisnummertoevoeging" value="' . $supplier->housenumber_suffix . '"></div>';
        echo '<div><label>Postcode:</label><input type="text" name="postalCode" required="true" value="' . $supplier->postalCode . '"></div>';
        echo '<div><label>Woonplaats:</label><input type="text" name="city" required="true" value="' . $supplier->city . '"></div>';
    } else {
        echo '<div><label>Naam:</label><input type="text" name="suppliername" required="true" value="' . $supplier->name . '" readonly></div>';
        echo '<div><label>Email:</label><input type="email" name="email" required="true" value="' . $supplier->email . '" readonly></div>';
        echo '<div><label>Telefoonnummer:</label><input type="tel" name="telephonenumber" required="true" value="' . $supplier->telephonenumber . '" readonly></div>';
        echo '<div><label>Adres:</label><input type="text" name="streetname" required="true" placeholder="Straatnaam" value="' . $supplier->streetname . '" readonly></div>';
        echo '<div><label></label><input class="small_field" type="text" name="housenumber" required="true" placeholder="Huisnummer" value="' . $supplier->housenumber . '" readonly></div>';
        echo '<div><label></label><input class="small_field" type="text" name="housenumberSuffix" placeholder="Huisnummertoevoeging" value="' . $supplier->housenumber_suffix . '" readonly></div>';
        echo '<div><label>Postcode:</label><input type="text" name="postalCode" required="true" value="' . $supplier->postalCode . '" readonly></div>';
        echo '<div><label>Woonplaats:</label><input type="text" name="city" required="true" value="' . $supplier->city . '" readonly></div>';
    }
}

/**
 * Get addresses info belonging to given username
 * @param type $username
 */
function addressInfo($username) {
    $userModel = new User();
    $users = $userModel->getUsers();

    $foundUser = "";
    foreach ($users as $user) {
        if ($user->username === $username) {
            $foundUser = $user;
        }
    }

    echo '<div><h5>Bezorgadres</h5></div>';
    echo '<div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameDelivery" required="true" placeholder="Straatnaam" value="' . $foundUser->streetname . '"></div>';
    echo '<div><label></label><input type="text" name="housenumberDelivery" required="true" placeholder="Huisnummer" value="' . $foundUser->housenumber . '"></div>';
    echo '<div><label></label><input type="text" name="housenumberSuffixDelivery" placeholder="Huisnummertoevoeging" value="' . $foundUser->housenumber_suffix . '"></div>';
    echo '<div><label for="postalCode">Postcode</label><input type="text" name="postalCodeDelivery" required="true" value="' . $foundUser->postalCode . '"></div>';
    echo '<div><label for="city">Woonplaats</label><input type="text" name="cityDelivery" required="true" value="' . $foundUser->city . '"></div>';
    echo '<div><h5>Factuuradres</h5></div>';
    echo '<div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameBilling" required="true" placeholder="Straatnaam" value="' . $foundUser->streetname . '"></div>';
    echo '<div><label></label><input type="text" name="housenumberBilling" required="true" placeholder="Huisnummer" value="' . $foundUser->housenumber . '"></div>';
    echo '<div><label></label><input type="text" name="housenumberSuffixBilling" placeholder="Huisnummertoevoeging" value="' . $foundUser->housenumber_suffix . '"></div>';
    echo '<div><label for="postalCode">Postcode</label><input type="text" name="postalCodeBilling" required="true" value="' . $foundUser->postalCode . '"></div>';
    echo '<div><label for="city">Woonplaats</label><input type="text" name="cityBilling" required="true" value="' . $foundUser->city . '"></div>';
}

?>