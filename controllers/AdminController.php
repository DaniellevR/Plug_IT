<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");
require_once($root . "/Plug_IT/models/Category.inc.php");
require_once($root . "/Plug_IT/models/Product.inc.php");
require_once($root . "/Plug_IT/models/Address.inc.php");
require_once($root . "/Plug_IT/models/User.inc.php");

class AdminController extends MainCtrl {

//    $objSmarty->assign("common", $objectname);

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();

        $action = "";
        if (isset($_SESSION["action"])) {
            $action = $_SESSION["action"];
            unset($_SESSION["action"]);
        }
        $smarty->assign('action', $action);

        $errors = "";
        if (isset($_SESSION["errors"])) {
            $errors = $_SESSION["errors"];
            unset($_SESSION["errors"]);
        }
        $smarty->assign('errors', $errors);

        $messages = "";
        if (isset($_SESSION["messages"])) {
            $messages = $_SESSION["messages"];
            unset($_SESSION["messages"]);
        }
        $smarty->assign('messages', $messages);

        $smarty->assign('page', $name);

        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('suppliers', $this->getSuppliers());
        $smarty->assign('users', $this->getUsers());
        $smarty->assign('roles', $this->getRoles());
        $smarty->assign('products', $this->getProducts());
        $smarty->assign('model', $model);
        $smarty->display($name . '.tpl');
    }

    public function removeCategory() {
        if (isset($_POST["categoryId"])) {
            $categoryModel = new Category();
            $res = $categoryModel->removeCategory($_POST['categoryId']);

            if ($res == 1) {
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

    public function removeProduct() {
        $file = fopen("C://removeproductc.txt", "w");
        fwrite($file, "REMOVE PRODUCT");
        fclose($file);

        if (isset($_POST["productId"])) {
            $productId = $_POST["productId"];

            $file = fopen("C://productId.txt", "w");
            fwrite($file, $productId);
            fclose($file);

            $productModel = new Product();
            $res = $productModel->removeProduct($productId);

            $file = fopen("C://res.txt", "w");
            fwrite($file, $res);
            fclose($file);

            
            if ($res == 1) {
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

    public function checkAndAddAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode) {
        // Check existance address
        $addressModel = new Address();
        $addresses = $addressModel->getAddresses();
        $addressId = -1;
        foreach ($addresses as $address) {
            //&& $address->housenumber == $housenumber && $addres->city == $city && $address->housenumberSuffix == $housenumberSuffix && $address->postalCode == $postalCode) {
            if ($address->streetname == $streetname && $address->housenumber == $housenumber && $addres->city == $city && $address->housenumberSuffix == $housenumberSuffix && $address->postalCode == $postalCode) {
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

    public function addOrder() {
        
    }

    public function EditOrder() {
        
    }

}
