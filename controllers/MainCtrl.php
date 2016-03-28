<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/NavigationItem.php");
require_once($root . "/Plug_IT/models/Category.php");
require_once($root . "/Plug_IT/models/Product.php");

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

    public function Admin() {
        $this->View('admin', '');
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

    public function OrderAndDeliviry() {
        $this->View('orderAndDeliviry', '');
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

?>