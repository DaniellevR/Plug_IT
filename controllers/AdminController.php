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
require_once($root . "/controllers/MainCtrl.php");
require_once($root . "/models/Category.inc.php");
require_once($root . "/models/Product.inc.php");
require_once($root . "/models/Address.inc.php");
require_once($root . "/models/User.inc.php");
require_once($root . "/models/Order.inc.php");

/**
 * AdminController for functionalities in the admin pages
 * @author Daniëlle
 */
class AdminController extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Set variables for usage in views
        // Action
        $action = "";
        if (isset($_SESSION["action"])) {
            $action = $_SESSION["action"];
            unset($_SESSION["action"]);
        }
        $smarty->assign('action', $action);

        // Errors
        $errors = "";
        if (isset($_SESSION["errors"])) {
            $errors = $_SESSION["errors"];
            unset($_SESSION["errors"]);
        }
        $smarty->assign('errors', $errors);

        // Messages
        $messages = "";
        if (isset($_SESSION["messages"])) {
            $messages = $_SESSION["messages"];
            unset($_SESSION["messages"]);
        }
        $smarty->assign('messages', $messages);

        // Further data
        $smarty->assign('page', $name);
        $smarty->assign('navigation', $this->getNavigationItems());
        $smarty->assign('categories', $this->getCategories());
        $smarty->assign('suppliers', $this->getSuppliers());
        $smarty->assign('users', $this->getUsers());
        $smarty->assign('roles', $this->getRoles());
        $smarty->assign('products', $this->getProducts());
        $smarty->assign('orders', $this->getOrders());
        $smarty->assign('states', $this->getStates());

        // Orders admin data
        if (isset($_SESSION["productsCartAdmin"])) {
            $smarty->assign('productsCartAdmin', $_SESSION["productsCartAdmin"]);
        } else {
            $smarty->assign('productsCartAdmin', array());
        }
        if (isset($_SESSION["usernameAddOrder"])) {
            $smarty->assign('usernameCartAdmin', $_SESSION["usernameAddOrder"]);
        }
        if (isset($_SESSION["deliveryAddressAdmin"])) {
            $smarty->assign('deliveryAddressAdmin', $_SESSION["deliveryAddressAdmin"]);
        }
        if (isset($_SESSION["billingAddressAdmin"])) {
            $smarty->assign('billingAddressAdmin', $_SESSION["billingAddressAdmin"]);
        }

        // Display
        $smarty->display($name . '.tpl');
    }

    /**
     * Remove category
     */
    public function removeCategory() {
        if (isset($_POST["categoryId"])) {
            // Remove category
            $categoryModel = new Category();
            $res = $categoryModel->removeCategory($_POST['categoryId']);

            if ($res == 1) {
                // Remove picture
                $path = "../assets/pix/categories/";
                foreach (glob($path . $_POST['categoryId'] . '.*') as $filename) {
                    unlink(realpath($filename));
                }
            } else {
                $_SESSION["errors"] = "Kon de categorie niet verwijderen.";
            }
        } else {
            $_SESSION["errors"] = "Kon de categorie niet verwijderen.";
        }
    }

    /**
     * Remove product
     */
    public function removeProduct() {
        if (isset($_POST["productId"])) {
            // Remove product
            $productId = $_POST["productId"];
            $productModel = new Product();
            $res = $productModel->removeProduct($productId);

            if ($res == 1) {
                // Remove picture
                $path = "../assets/pix/products/";
                foreach (glob($path . $productId . '.*') as $filename) {
                    unlink(realpath($filename));
                }
            } else {
                $_SESSION["errors"] = "Kon het product niet verwijderen.";
            }
        } else {
            $_SESSION["errors"] = "Kon het product niet verwijderen.";
        }
    }

    /**
     * Add user
     */
    public function addUser() {
        $_SESSION["action"] = "addUser";

        if (isset($_POST["firstname"]) && isset($_POST["prefix"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["telephonenumber"]) && isset($_POST["streetname"]) && isset($_POST["housenumber"]) && isset($_POST["housenumberSuffix"]) && isset($_POST["postalCode"]) && isset($_POST["city"]) && isset($_POST["username"]) && isset($_POST["role"]) && isset($_POST["password"]) && isset($_POST["repeatPassword"]) && isset($_POST["page"])) {
            $firstname = $_POST["firstname"];
            $prefix = $_POST["prefix"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $telephonenumber = $_POST["telephonenumber"];
            $streetname = $_POST["streetname"];
            $housenumber = $_POST["housenumber"];
            $housenumberSuffix = $_POST["housenumberSuffix"];
            $postalCode = $_POST["postalCode"];
            $city = $_POST["city"];
            $username = $_POST["username"];
            $rolename = $_POST["role"];
            $password = $_POST["password"];
            $repeatPassword = $_POST["repeatPassword"];
            $page = $_POST["page"];

            if (strcmp($password, $repeatPassword) === 0) {
                $userModel = new User();

                // Check existance username
                $users = $userModel->getUsers();
                $usernameFound = "FALSE";
                foreach ($users as $user) {
                    if ($user->username === $username) {
                        $usernameFound = "TRUE";
                        break;
                    }
                }

                if ($usernameFound === "TRUE") {
                    // Already exists
                    $_SESSION["errors"] = "Gebruikersnaam is al in gebruik.";
                    echo "error";
                } else {
                    // Check (and add) address
                    $addressId = $this->checkAndAddAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode);

                    if ($addressId > 0) {
                        // Add user
                        $hashedPassword = $this->hash($password);
                        $user_id = $userModel->addUser($username, $hashedPassword, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename);

                        if ($user_id === 1) {
                            // Add user and address connection
                            $ret = $userModel->connectUserWithAddress($username, $addressId);
                            if ($ret === 1) {
                                // Session
                                if ($page === "register") {
                                    $_SESSION["username"] = $username;
                                    $_SESSION["usertype"] = $rolename;
                                }
                            } else {
                                $_SESSION["errors"] = "U bent geregistreerd, maar uw adres kon niet gekoppeld worden aan uw account.";
                                echo "error";
                            }
                        } else {
                            $_SESSION["errors"] = "Er is een fout opgetreden bij het registreren. Probeer het opnieuw.";
                            echo "error";
                        }
                    } else {
                        $_SESSION["errors"] = "Kon het adres niet toevoegen in de database.\r\nU bent niet geregistreerd. Probeer het opnieuw.";
                        echo "error";
                    }
                }
            } else {
                $_SESSION["errors"] = "Het herhaalde wachtwoord komt niet overeen.";
                echo "error";
            }
        } else {
            $_SESSION["errors"] = "Er is een fout opgetreden. Probeer het opnieuw.";
            echo "error";
        }
    }

    /**
     * Check if address exists, if not add it to the database
     * @param type $streetname
     * @param type $housenumber
     * @param type $city
     * @param type $housenumberSuffix
     * @param type $postalCode
     * @return type address id
     */
    public function checkAndAddAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode) {
        // Check existance address
        $addressModel = new Address();
        $addresses = $addressModel->getAddresses();
        $addressId = -1;
        foreach ($addresses as $address) {
            if ($address->streetname == $streetname && $address->housenumber == $housenumber && $address->city == $city && $address->housenumberSuffix == $housenumberSuffix && $address->postalCode == $postalCode) {
                $addressId = $address->id;
                break;
            }
        }

        if ($addressId === -1) {
            // Add address
            return $addressModel->addAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode);
        }

        return $addressId;
    }

    /**
     * Edit user
     */
    public function editUser() {
        $_SESSION["action"] = "editUser";
        $errors = "";

        if (isset($_POST["firstname"]) && isset($_POST["prefix"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["telephonenumber"]) && isset($_POST["streetname"]) && isset($_POST["housenumber"]) && isset($_POST["housenumberSuffix"]) && isset($_POST["postalCode"]) && isset($_POST["city"]) && isset($_POST["username"]) && isset($_POST["role"])) {
            $firstname = $_POST["firstname"];
            $prefix = $_POST["prefix"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $telephonenumber = $_POST["telephonenumber"];
            $streetname = $_POST["streetname"];
            $housenumber = $_POST["housenumber"];
            $housenumberSuffix = $_POST["housenumberSuffix"];
            $postalCode = $_POST["postalCode"];
            $city = $_POST["city"];
            $username = $_POST["username"];
            $rolename = $_POST["role"];

            // Find user
            $userModel = new User();
            $users = $userModel->getUsers();
            $foundUser = NULL;
            foreach ($users as $user) {
                if ($user->username === $username) {
                    $foundUser = $user;
                    break;
                }
            }

            $newPassword = $foundUser->password;

            if (isset($_POST["currentPassword"]) && isset($_POST["password"]) && isset($_POST["repeatPassword"])) {
                $currentPassword = $_POST["currentPassword"];
                $password = $_POST["password"];
                $repeatPassword = $_POST["repeatPassword"];

                // Compare given passwords
                if (strcmp($password, $repeatPassword) === 0) {
                    // Check current password
                    $givenHashedPassword = crypt($currentPassword, $foundUser->password);

                    if ($givenHashedPassword === $foundUser->password) {
                        // If correct change password
                        $newPassword = $this->hash($password);
                    } else {
                        $errors = "Het wijzigen van het wachtwoord is mislukt.\r\n";
                    }
                } else {
                    $errors = "Het herhaalde wachtwoord komt niet overeen.\r\n";
                }
            }

            // Check (and add) address
            $addressId = $this->checkAndAddAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode);

            if ($addressId > 0) {
                // Remove old connection
                $ret = $userModel->disconnectUserFromAddresses($username);

                if ($ret == 1) {
                    // Add user and address connection
                    $ret = $userModel->connectUserWithAddress($username, $addressId);
                    if ($ret != 1) {
                        $errors = $errors . "Er is een fout opgetreden. Uw adresgegevens zijn helaas verwijderd.\r\n";
                    }
                } else {
                    $errors = $errors . "Kon uw adres niet wijzigen. Probeer het opnieuw.\r\n";
                }
            } else {
                $errors = $errors . "Kon uw adres niet wijzigen. Probeer het opnieuw.\r\n";
            }

            // Edit user
            $res = $userModel->editUser($username, $newPassword, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename);
            if ($res != 1) {
                // Edit user not succeeded
                $errors = $errors . "Kon uw persoonsgegevens niet wijzigen. Probeer het opnieuw.";
            }
        } else {
            $errors = "Er is een fout opgetreden. Probeer het opnieuw.";
        }

        if ($errors !== "") {
            $_SESSION["errors"] = $errors;
            echo "error";
        }
    }

    /**
     * Reset the order from the admin page
     */
    public function resetOrder() {
        // Forget username
        if (isset($_SESSION["usernameAddOrder"])) {
            unset($_SESSION["usernameAddOrder"]);
        }

        // Forget delivery address
        if (isset($_SESSION["deliveryAddressAdmin"])) {
            unset($_SESSION["deliveryAddressAdmin"]);
        }

        // Forget billing address
        if (isset($_SESSION["billingAddressAdmin"])) {
            unset($_SESSION["billingAddressAdmin"]);
        }

        // Forget products in order
        if (isset($_SESSION["productsCartAdmin"])) {
            unset($_SESSION["productsCartAdmin"]);
        }
    }

    /**
     * Request from the add order form in the admin page
     */
    public function addOrder() {
        $errors = "";

        if (isset($_POST["username"]) && isset($_POST["streetnameDelivery"]) && isset($_POST["housenumberDelivery"]) && isset($_POST["housenumberSuffixDelivery"]) && isset($_POST["postalCodeDelivery"]) && isset($_POST["cityDelivery"]) && isset($_POST["streetnameBilling"]) && isset($_POST["housenumberBilling"]) && isset($_POST["housenumberSuffixBilling"]) && isset($_POST["postalCodeBilling"]) && isset($_POST["cityBilling"]) && isset($_POST["productId"]) && isset($_POST["amount"]) && isset($_POST["button"])) {
            $username = $_POST["username"];
            $streetnameDelivery = $_POST["streetnameDelivery"];
            $housenumberDelivery = $_POST["housenumberDelivery"];
            $housenumberSuffixDelivery = $_POST["housenumberSuffixDelivery"];
            $postalCodeDelivery = $_POST["postalCodeDelivery"];
            $cityDelivery = $_POST["cityDelivery"];
            $streetnameBilling = $_POST["streetnameBilling"];
            $housenumberBilling = $_POST["housenumberBilling"];
            $housenumberSuffixBilling = $_POST["housenumberSuffixBilling"];
            $postalCodeBilling = $_POST["postalCodeBilling"];
            $cityBilling = $_POST["cityBilling"];
            $productId = $_POST["productId"];
            $amount = $_POST["amount"];
            $button = $_POST["button"];

            // Remember username
            $_SESSION["usernameAddOrder"] = $username;

            // Remember delivery address
            $_SESSION["deliveryAddressAdmin"] = array($streetnameDelivery, $housenumberDelivery, $housenumberSuffixDelivery, $postalCodeDelivery, $cityDelivery);

            // Remember billing address
            $_SESSION["billingAddressAdmin"] = array($streetnameBilling, $housenumberBilling, $housenumberSuffixBilling, $postalCodeBilling, $cityBilling);

            // Take the correct action
            if ($button === "addProduct") {
                $this->addProductToOrder($productId, $amount);
            } else {
                $this->saveOrder();
            }
        } else {
            $errors = "Er is een fout opgetreden. Probeer het opnieuw.";
        }

        if ($errors !== "") {
            $_SESSION["errors"] = $errors;
        }
    }

    /**
     * Add the product to the cart (admin page)
     * @param type $productId
     * @param type $amount
     */
    public function addProductToOrder($productId, $amount) {
        // Find the product
        $productModel = new Product();
        $foundProduct = $productModel->getProductFromId($productId);
        $foundProduct->amountInCartAdmin = $amount;

        if (isset($_SESSION["productsCartAdmin"])) {
            // Remember products
            $productInfos = $_SESSION["productsCartAdmin"];
            unset($_SESSION["productsCartAdmin"]);

            // Check if the product is already in the cart
            $isInCart = "";
            foreach ($productInfos as $productInfo) {
                if ($productInfo[0] === $productId) {
                    // Product in the cart, edit the amount
                    $isInCart = "yes";
                    $newAmount = $productInfo[2] + $amount;
                    $newProductInfo = array($foundProduct->id, $foundProduct->name, $newAmount, $foundProduct->price);
                    $_SESSION["productsCartAdmin"][] = $newProductInfo;
                } else {
                    // Product not in the cart, add the product
                    $_SESSION["productsCartAdmin"][] = $productInfo;
                }
            }

            // Add the product to the cart if it isn't already in it
            if ($isInCart === "") {
                $productInfo = array($foundProduct->id, $foundProduct->name, $foundProduct->amountInCartAdmin, $foundProduct->price);
                $_SESSION["productsCartAdmin"][] = $productInfo;
            }
        } else {
            // Create new cart with product
            $productInfo = array($foundProduct->id, $foundProduct->name, $foundProduct->amountInCartAdmin, $foundProduct->price);
            $_SESSION["productsCartAdmin"][] = $productInfo;
        }
    }

    /**
     * Change the amount of a product in the cart
     */
    public function changeAmount() {
        if (isset($_POST["newAmount"]) && isset($_POST["productId"])) {
            $amount = $_POST["newAmount"];
            $productId = $_POST["productId"];

            $productModel = new Product();
            $foundProduct = $productModel->getProductFromId($productId);

            if (isset($_SESSION["productsCartAdmin"])) {
                // Remember products
                $productInfos = $_SESSION["productsCartAdmin"];
                unset($_SESSION["productsCartAdmin"]);

                // Edit amount for correct product
                foreach ($productInfos as $productInfo) {
                    if ($productInfo[0] === $productId) {
                        // Product in the cart, edit the amount
                        $isInCart = "yes";
                        if ($amount != 0) {
                            $newProductInfo = array($foundProduct->id, $foundProduct->name, $amount, $foundProduct->price);
                            $_SESSION["productsCartAdmin"][] = $newProductInfo;
                        }
                    } else {
                        // Product not in the cart, add the product
                        $_SESSION["productsCartAdmin"][] = $productInfo;
                    }
                }
            }
        }
    }

    /**
     * Save the order in the database
     */
    public function saveOrder() {
        if (isset($_SESSION["usernameAddOrder"]) && isset($_SESSION["deliveryAddressAdmin"]) && isset($_SESSION["billingAddressAdmin"]) && isset($_SESSION["productsCartAdmin"])) {
            $username = $_SESSION["usernameAddOrder"];
            $deliveryAddress = $_SESSION["deliveryAddressAdmin"];
            $billingAddress = $_SESSION["billingAddressAdmin"];
            $products = $_SESSION["productsCartAdmin"];
            $orderModel = new Order();

            // Calculate the price
            $price = 0.00;
            foreach ($products as $productInfo) {
                $productsPrice = $productInfo[2] * $productInfo[3];
                $price = $price + $productsPrice;
            }

            // Check (and add) delivery address
            $deliveryAddressId = $this->checkAndAddAddress($deliveryAddress[0], $deliveryAddress[1], $deliveryAddress[4], $deliveryAddress[2], $deliveryAddress[3]);

            // Check (and add) billing address
            $billingAddressId = $this->checkAndAddAddress($billingAddress[0], $billingAddress[1], $billingAddress[4], $billingAddress[2], $billingAddress[3]);

            // Create order
            $orderId = $orderModel->createFullOrder($username, $deliveryAddressId, $billingAddressId, "Unpaid", $price);

            if ($orderId > 0) {
                // Add products to order
                foreach ($products as $productInfo) {
                    $orderModel->addProductToOrder($orderId, $productInfo[0], $productInfo[2]);
                }

                // Forget username
                unset($_SESSION["usernameAddOrder"]);

                // Forget delivery address
                unset($_SESSION["deliveryAddressAdmin"]);

                // Forget billing address
                unset($_SESSION["billingAddressAdmin"]);

                // Forget products in order
                unset($_SESSION["productsCartAdmin"]);
            } else {
                $_SESSION["errors"] = "Kon de order niet vastleggen in de database. Probeer het opnieuw.";
            }
        } else {
            $_SESSION["errors"] = "Er is een fout opgetreden. Check of uw producten heeft gekozen. Probeer het opnieuw.";
        }
    }

    /**
     * Edit the state of the order
     */
    public function editOrder() {
        $errors = "";

        if (isset($_POST["orderId"]) && isset($_POST["state"])) {
            $orderId = $_POST["orderId"];
            $state = $_POST["state"];

            $orderModel = new Order();
            $ret = $orderModel->editState($orderId, $state);

            if ($ret != 1) {
                $errors = "Kon de status van de order niet aanpassen. Probeer het opnieuw.";
            }
        } else {
            $errors = "Er is een fout opgetreden. Probeer het opnieuw.";
        }

        if ($errors !== "") {
            $_SESSION["errors"] = $errors;
        }
    }

}
