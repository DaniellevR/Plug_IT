<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/NavigationItem.inc.php");
require_once($root . "/Plug_IT/models/Category.inc.php");
require_once($root . "/Plug_IT/models/Supplier.inc.php");
require_once($root . "/Plug_IT/models/User.inc.php");
require_once($root . "/Plug_IT/models/Role.inc.php");
require_once($root . "/Plug_IT/models/Address.inc.php");

class MainCtrl {

    public function Home() {
        $this->View('home', 'Hello world');
    }

    public function About() {
        $this->View('about', 'Im awesome');
    }

    public function Contact() {
        $this->View('contact', 'Call me maybe?');
    }

    public function AdminCategories() {
        $this->View('categoriesforms', '');
    }

    public function AdminProducts() {
        $this->View('productsforms', '');
    }

    public function AdminUsers() {
        $this->View('usersforms', '');
    }

    public function AdminOrders() {
        $this->View('ordersforms', '');
    }

    public function Catalogue() {
        $this->View('catalogue', '');
    }

    public function Category() {
        $this->View('category', '');
    }

    public function Conditions() {
        $this->View('conditions', '');
    }

    public function Information() {
        $this->View('information', '');
    }

    public function OrderAndDelivery() {
        $this->View('orderAndDelivery', '');
    }

    public function PaymentInfo() {
        $this->View('paymentInfo', '');
    }

    public function Product() {
        $this->View('product', '');
    }

    public function RetourInfo() {
        $this->View('retourInfo', '');
    }

    public function Cart() {
        $this->View('cart', '');
    }

    public function Wishlist() {
        $this->View('wishlist', '');
    }

    public function MyAccount() {
        $this->View('myAccount', '');
    }

    public function CustomerService() {
        $this->View('customerService', '');
    }

    public function Login() {
        $this->View('login', '');
    }

    public function Register() {
        $this->View('register', '');
    }

    public function Tasks() {
        $this->View('tasks', '');
    }

    public function getNavigationItems() {
        $navigationItemModel = new NavigationItem();
        $navigationItems = $navigationItemModel->getNavigationItems();

        $header = array();
        $footer = array();
        $nav = array();

        // Sort
        foreach ($navigationItems as $item) {
            if ($item->location === "Header") {
                $header[] = $item;
            } else {
                $footer[] = $item;
            }
        }

        $nav[] = $header;
        $nav[] = $footer;

        return $nav;
    }

    public function getCategories() {
        $categoryModel = new Category();
        $categories = $categoryModel->getCategories();

        $catalogue_catagories = array();
        $children = array();

        $sideNavigation = array();

        // Sort
        foreach ($categories as $cat) {
            if (is_null($cat->parent)) {
                $catalogue_catagories[] = $cat;
            } else {
                $children[] = $cat;
            }
        }

        $sideNavigation[] = $catalogue_catagories;
        $sideNavigation[] = $children;

        return $sideNavigation;
    }

    public function getSuppliers() {
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->getSuppliers();
        return $suppliers;
    }

    public function getRoles() {
        $roleModel = new Role();
        $roles = $roleModel->getRoles();
        return $roles;
    }

    public function getUsers() {
        $userModel = new User();
        $users = $userModel->getUsers();
        return $users;
    }
    
    public function getAddresses() {
        $addressModel = new Address();
        $addresses = $addressModel->getAddresses();
        return $addresses;
    }

    public function getProductsByKeywords($keywords) {
        $product = new Product();
        $products = $product->getAllProducts();

        $outputProducts = array();

        foreach ($products as $prod) {
            foreach ($prod as $text) {
                if (isset($text)) {
                    if (strpos(strtoupper($keywords), strtoupper($text)) !== false) {
                        $outputProducts[] = $prod;
                    }
                }
            }
        }
        return $outputProducts;
    }

    public function loginUser() {
        $_SESSION["action"] = "login";
        
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            
            $userModel = new User();
            $data = $userModel->loginCheck($username);

            $givenHashedPassword = crypt($password, $data[0]);

            if ($givenHashedPassword === $data[0]) {
                $_SESSION["username"] = $username;
                $_SESSION["usertype"] = $data[1];
                echo $data[1];
            } else {
                $_SESSION["errors"] = "Gebruikersnaam en/of wachtwoord is onjuist.";
                echo "error";
            }
        } else {
            $_SESSION["errors"] = "Er is iets misgegaan bij het inloggen. Probeer het opnieuw.";
            echo "error";
        }
    }

    public function logoutUser() {
        unset($_SESSION['username']);
        unset($_SESSION['usertype']);
        session_write_close();
    }

    public function hash($password) {
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;
        $hash = crypt($password, $salt);
        return $hash;
    }

}

session_start();
session_cache_expire(1800);
?>