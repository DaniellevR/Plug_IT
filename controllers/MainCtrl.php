<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/NavigationItem.php");
require_once($root . "/Plug_IT/models/Category.php");
require_once($root . "/Plug_IT/models/Supplier.php");
require_once($root . "/Plug_IT/models/User.php");
require_once($root . "/Plug_IT/models/Role.php");

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
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            session_start();
            echo "/Plug_IT/index.php?page=Home";

            $_SESSION["usertype"] = "Admin";
//            $_SESSION["usertype"] = "Gebruiker";
        }
    }

    public function logoutUser() {
        if (isset($_SESSION['user'])) {
            session_destroy();
        }
        echo "/Plug_IT/index.php?page=Home";
    }

}

session_start();
session_cache_expire(1800);
?>