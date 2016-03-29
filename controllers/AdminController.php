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
        if (isset($_POST["firstname"]) && isset($_POST["prefix"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["telephonenumber"]) && isset($_POST["streetname"]) && isset($_POST["housenumber"]) && isset($_POST["housenumberSuffix"]) && isset($_POST["postalCode"]) && isset($_POST["city"]) && isset($_POST["username"]) && isset($_POST["role"]) && isset($_POST["password"]) && isset($_POST["reapeatPassword"])) {
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
            $repeat_password = $_POST["repeat_password"];

            $userModel = new User();
            $addressModel = new Address();

            if ($userModel->checkIfUsernameExists($username) == "") {
                $addressSaved = FALSE;

                $ret = $addressModel->checkIfAddressExists($streetname, $housenumber, $city, $housenumberSuffix, $postalCode);
                $file = fopen("C://test.txt", "w");
                fwrite($file, "RETURN : " . $ret);
                fclose($file);

                if ($ret != "") {
                    $res = $addressModel->addAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode);
                    if ($res != -1) {
                        $addressSaved = TRUE;
                    }
                } else {
                    $addressSaved = TRUE;
                }

                $file = fopen("C://test.txt", "w");
                fwrite($file, $addressSaved);
                fclose($file);

                if ($addressSaved === TRUE) {
                    if ($userModel->addUser($username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename) > 0) {
                        
                    }
                }
            }
        }
    }

    public function editUser() {
        
    }

    public function addOrder() {
        
    }

    public function EditOrder() {
        
    }

}
