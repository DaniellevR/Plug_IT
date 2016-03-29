<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");

class ShoppingcartController extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();
        if (isset($_SESSION['cartList'])) {
            $cartList = $this->getProductsFromId($_SESSION['cartList']);
        }
//        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        if (isset($cartList)) {
            $smarty->assign('cartList', $cartList);
        }
        $smarty->assign('model', $model);
        $smarty->assign("controller", $this);
        $smarty->assign('footer', ['Informatie', 'Bestelling & levering', 'Betalen', 'Retourneren', 'Voorwaarden', 'Over', 'Contact']);
        $smarty->display($name . '.tpl');
    }

    public function getProductsFromId($ids) {
        require_once 'models/Product.php';
        $product = new Product();
        $products = $product->getProductsFromId($ids);

        return $products;
    }

}
