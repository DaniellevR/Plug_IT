<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");
require_once($root . "/Plug_IT/models/Product.inc.php");

class ShoppingcartController extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();
        if (isset($_POST['id']) && isset($_POST['amount'])) {
            $this->addProductToCart($_POST['id'], $_POST['amount']);
        }
        if (isset($_POST['removeId'])) {
            $this->removeFromCart($_POST['removeId']);
        }
        if (isset($_SESSION['cartList'])) {
            $cartList = $_SESSION['cartList'];
        }
        if (isset($_POST['id']) && isset($_POST['amount'])) {
            $this->editAmountInCart($_POST['id'], $_POST['amount']);
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

    public function removeFromCart($id) {
        for ($i = 0; $i < count($_SESSION['cartList']); $i++) {
            if ($_SESSION['cartList'][$i]->id == $id) {
                unset($_SESSION['cartList'][$i]);
                return;
            }
        }
    }

    public function editAmountInCart($id, $amount) {
        for ($i = 0; $i < count($_SESSION['cartList']); $i++) {
            if ($_SESSION['cartList'][$i]->id == $id) {
                if ($amount < 1) {
                    unset($_SESSION['cartList'][$i]);
                    return;
                } else {
                    $_SESSION['cartList'][$i]->amountInCart = $amount;
                }
            }
        }
    }

    public function addProductToCart($id, $amount) {
        if (!isset($_SESSION['cartList'])) {
            $_SESSION['cartList'] = array();
        }

        foreach ($_SESSION['cartList'] as $i) {
            if ($i->id == $id) {
                $i->amountInCart = $i->amountInCart + $amount;
                return;
            }
        }

        $product = new Product();
        $p = $product->getProductFromId($id);
        $p->amountInCart = $amount;
        $_SESSION['cartList'][] = $p;
        return;
    }

}
