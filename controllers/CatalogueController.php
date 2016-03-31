<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");

class CatalogueController extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();
        $allCategories = $this->getAllCategories();
        if (isset($_GET['id'])) {
            $childCategories = $this->getChildCategoriesFromId($_GET['id']);
            $products = $this->getProductsFromCategoryId($_GET['id']);
        }
        if (isset($_GET['searchKeywords'])) {
            $productsFound = $this->getProductsByKeywords($_GET['searchKeywords']);
            $smarty->assign('productsFound', $productsFound);
        }

//        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('allCategories', $allCategories);
        if (isset($_GET['id'])) {
            $smarty->assign('childCategories', $childCategories);
            $smarty->assign('products', $products);
        }
        $smarty->assign('model', $model);
        $smarty->assign("controller", $this);
        $smarty->assign('footer', ['Informatie', 'Bestelling & levering', 'Betalen', 'Retourneren', 'Voorwaarden', 'Over', 'Contact']);
        $smarty->display($name . '.tpl');
    }

    public function getAllCategories() {
        require_once 'models/Category.php';
        $category = new Category();
        $allCategories = $category->getCategories();

        return $allCategories;
    }

    public function getChildCategoriesFromId($catId) {
        require_once 'models/Category.php';
        $category = new Category();
        $childCategories = $category->getChildCategoriesFromId($catId);

        return $childCategories;
    }

    public function getProductFromId($id) {
        require_once 'models/Product.php';
        $product = new Product();
        $outputProduct = $product->getProductFromId($id);

        return $outputProduct;
    }

    public function getProductsFromCategoryId($catId) {
        require_once 'models/Product.php';
        $product = new Product();
        $products = $product->getProductsFromCategoryId($catId);

        return $products;
    }

}
