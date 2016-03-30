<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");
require_once($root . "/Plug_IT/models/Category.php");
require_once($root . "/Plug_IT/models/Product.php");
require_once($root . "/Plug_IT/models/Address.php");
require_once($root . "/Plug_IT/models/User.php");

class AdminController extends MainCtrl {

//    $objSmarty->assign("common", $objectname);

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();

//        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('suppliers', $this->getSuppliers());
        $smarty->assign('users', $this->getUsers());
        $smarty->assign('roles', $this->getRoles());
        $smarty->assign('model', $model);
        $smarty->assign('footer', ['Informatie', 'Bestelling & levering', 'Betalen', 'Retourneren', 'Voorwaarden', 'Over', 'Contact']);
        $smarty->display($name . '.tpl');
    }

//    public function addCategory() {
//        
//    }
//
//    public function editCategory() {
//        if (isset($_POST["categoriesEdit"]) && isset($_POST["categoryDescriptionEdit"])) {
//            formParentCategories
//        }
//    }

    public function removeCategory() {
        if (isset($_POST["categoryId"])) {
            $categoryModel = new Category();
            $res = $categoryModel->removeCategory($_POST['categoryId']);

            if ($res == 1) {
                $path = "../categories/";
                foreach (glob($path . $_POST['categoryId'] . '*') as $filename) {
                    unlink(realpath($filename));
                }
            }
        }

//        $this->Admin();
    }

    public function addProduct() {
        
    }

    public function editProduct() {
        
    }

    public function removeProduct() {
        if (isset($_POST["productId"])) {
            $productModel = new Product();
            $res = $productModel->removeProduct($_POST['productId']);

            if ($res == 1) {
                $path = "../products/";
                foreach (glob($path . $_POST['productId'] . '*') as $filename) {
                    unlink(realpath($filename));
                }
            }
        }
    }

    public function addUser() {
        if (isset($_POST["firstname"]) && isset($_POST["prefix"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["telephonenumber"]) && isset($_POST["streetname"]) && isset($_POST["housenumber"]) && isset($_POST["housenumberSuffix"]) && isset($_POST["postalCode"]) && isset($_POST["city"]) && isset($_POST["username"]) && isset($_POST["role"]) && isset($_POST["password"]) && isset($_POST["repeatPassword"])) {
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
            } else {
                // Check (and add) address
                $addressId = $this->checkAndAddAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode);

                // Add user
                $user_id = $userModel->addUser($username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename);

                // Add user and address connection
                $userModel->connectUserWithAddress($username, $addressId);
            }
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
        if (isset($_POST["firstname"]) && isset($_POST["prefix"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["telephonenumber"]) && isset($_POST["streetname"]) && isset($_POST["housenumber"]) && isset($_POST["housenumberSuffix"]) && isset($_POST["postalCode"]) && isset($_POST["city"]) && isset($_POST["username"]) && isset($_POST["role"]) && isset($_POST["currentPassword"]) && isset($_POST["password"]) && isset($_POST["repeatPassword"])) {
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
            $currentPassword = $_POST["currentPassword"];
            $password = $_POST["password"];
            $repeatPassword = $_POST["repeatPassword"];

            $userModel = new User();


            // Check (and add) address
            $addressId = $this->checkAndAddAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode);

            // Edit user
            $user_id = $userModel->addUser($username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename);

            // Add user and address connection
            $userModel->connectUserWithAddress($username, $addressId);
        }
    }

    public function addOrder() {
        
    }

    public function EditOrder() {
        
    }

}
