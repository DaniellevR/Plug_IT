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
require_once($root . "/models/NavigationItem.inc.php");
require_once($root . "/models/Category.inc.php");
require_once($root . "/models/Supplier.inc.php");
require_once($root . "/models/User.inc.php");
require_once($root . "/models/Role.inc.php");
require_once($root . "/models/Address.inc.php");
require_once($root . "/models/Order.inc.php");
require_once($root . "/models/Product.inc.php");
require_once($root . "/models/CartProduct.inc.php");

/**
 * Main for the controllers
 */
class MainCtrl {

    /**
     * Call function to view home
     */
    public function Home() {
        $this->View('home', 'Hello world');
    }

    /**
     * Call function to view about
     */
    public function About() {
        $this->View('about', 'Im awesome');
    }

    /**
     * Call function to view contact
     */
    public function Contact() {
        $this->View('contact', 'Call me maybe?');
    }

    /**
     * Call function to view admin categories
     */
    public function AdminCategories() {
        $this->View('categoriesforms', '');
    }

    /**
     * Call function to view admin products
     */
    public function AdminProducts() {
        $this->View('productsforms', '');
    }

    /**
     * Call function to view admin users
     */
    public function AdminUsers() {
        $this->View('usersforms', '');
    }

    /**
     * Call function to view admin orders
     */
    public function AdminOrders() {
        $this->View('ordersforms', '');
    }

    /**
     * Call function to view catalogue
     */
    public function Catalogue() {
        $this->View('catalogue', '');
    }

    /**
     * Call function to view category page
     */
    public function Category() {
        $this->View('category', '');
    }

    /**
     * Call function to view conditions
     */
    public function Conditions() {
        $this->View('conditions', '');
    }

    /**
     * Call function to view Information
     */
    public function Information() {
        $this->View('information', '');
    }

    /**
     * Call function to view order and delivery
     */
    public function OrderAndDelivery() {
        $this->View('orderAndDelivery', '');
    }

    /**
     * Call function to view order and delivery info
     */
    public function OrderAndDeliveryInfo() {
        $this->View('orderAndDeliveryInfo', '');
    }

    /**
     * Call function to view payment info
     */
    public function PaymentInfo() {
        $this->View('paymentInfo', '');
    }

    /**
     * Call function to view product page
     */
    public function Product() {
        $this->View('product', '');
    }

    /**
     * Call function to view retour info
     */
    public function RetourInfo() {
        $this->View('retourInfo', '');
    }

    /**
     * Call function to view cart
     */
    public function Cart() {
        $this->View('cart', '');
    }

    /**
     * Call function to view wishlist
     */
    public function Wishlist() {
        $this->View('wishlist', '');
    }

    /**
     * Call function to view the account page of the logged in user
     */
    public function MyAccount() {
        $this->View('myAccount', '');
    }

    /**
     * Call function to view customer service
     */
    public function CustomerService() {
        $this->View('customerService', '');
    }

    /**
     * Call function to view login page
     */
    public function Login() {
        $this->View('login', '');
    }

    /**
     * Call function to view register page
     */
    public function Register() {
        $this->View('register', '');
    }

    /**
     * Call function to view tasks
     */
    public function Tasks() {
        $this->View('tasks', '');
    }

    /**
     * Get navigation items for the header and footer
     * @return type double array
     */
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

    /**
     * Get categories
     * @return type array sorted by categories and subcategories
     */
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

    /**
     * Get suppliers
     * @return type array
     */
    public function getSuppliers() {
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->getSuppliers();
        return $suppliers;
    }

    /**
     * Get roles
     * @return type array
     */
    public function getRoles() {
        $roleModel = new Role();
        $roles = $roleModel->getRoles();
        return $roles;
    }

    /**
     * Get users
     * @return type array
     */
    public function getUsers() {
        $userModel = new User();
        $users = $userModel->getUsers();
        return $users;
    }

    /**
     * Get addresses
     * @return type array
     */
    public function getAddresses() {
        $addressModel = new Address();
        $addresses = $addressModel->getAddresses();
        return $addresses;
    }

    /**
     * Get products
     * @return type array
     */
    public function getProducts() {
        $productModel = new Product();
        $products = $productModel->getProducts();
        return $products;
    }

    /**
     * Get orders
     * @return type array
     */
    public function getOrders() {
        $orderModel = new Order();
        $orders = $orderModel->getOrders();
        return $orders;
    }

    /**
     * Get states order
     * @return type array
     */
    public function getStates() {
        $orderModel = new Order();
        $states = $orderModel->getStates();
        return $states;
    }

    /**
     * Get products by keywords
     * @param type $keywords
     * @return type
     */
    public function getProductsByKeywords($keywords) {
        $product = new Product();
        $products = $product->getProducts();

        $outputProducts = array();

        foreach ($products as $product) {
            foreach ($product as $text) {
                if (isset($text)) {
                    if (strpos(strtoupper($text), strtoupper($keywords)) !== false) {
                        $outputProducts[] = $product;
                        break;
                    }
                }
            }
        }
        return $outputProducts;
    }

    /**
     * Handle login request
     */
    public function loginUser() {
        $_SESSION["action"] = "login";

        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $userModel = new User();
            $data = $userModel->loginCheck($username);
            $givenHashedPassword = crypt($password, $data[0]);

            if ($givenHashedPassword === $data[0]) {
                // Logged in
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

    /**
     * Handle logout request
     */
    public function logoutUser() {
        unset($_SESSION['username']);
        unset($_SESSION['usertype']);
        session_write_close();
    }

    /**
     * Hash the password with random salt
     * @param type $password
     * @return type string
     */
    public function hash($password) {
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;
        $hash = crypt($password, $salt);
        return $hash;
    }

}

// Start the session (duration 30 minutes)
session_start();
session_cache_expire(1800);
?>