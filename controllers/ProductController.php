<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");

class ProductController extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();
        $product = $this->getProductFromId($_GET['id']);

//        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('model', $model);
        $smarty->assign('product', $product);
        $smarty->assign("controller", $this);
        $smarty->assign('footer', ['Informatie', 'Bestelling & levering', 'Betalen', 'Retourneren', 'Voorwaarden', 'Over', 'Contact']);
        $smarty->display($name . '.tpl');
    }

    public function getProductFromId($id) {
        require_once 'models/Product.php';
        $product = new Product();

        $outputProduct = $product->getProductFromId($id);

        return $outputProduct;
    }

    public function getProductFromCategoryId($catId) {
        require_once 'models/Product.php';
        $product = new Product();
        $products = $product->getProductsFromCategoryId($catId);

        return $products;
    }

}
