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

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");

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

        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        if (isset($cartList)) {
            $smarty->assign('cartList', $cartList);
        }
        $smarty->assign('model', $model);
        $smarty->assign("controller", $this);
        $smarty->display($name . '.tpl');
    }

    public function removeFromCart($id) {
        $tempArray = array();
        foreach ($_SESSION['cartList'] as $cartProduct) {
            if ($cartProduct->product->id != $id) {
                $tempArray[] = $cartProduct;
            }
        }
        $_SESSION['cartList'] = $tempArray;
    }

    public function editAmountInCart($id, $amount) {
        foreach ($_SESSION['cartList'] as $cartProduct) {
            if ($cartProduct->product->id == $id) {
                $cartProduct->amount = $amount;
            }
        }
    }

    public function addProductToCart($id, $amount) {
        if (!isset($_SESSION['cartList'])) {
            $_SESSION['cartList'] = array();
        }

        foreach ($_SESSION['cartList'] as $i) {
            $idToCheck = $i->product->id;
            if ($idToCheck == $id) {
                $i->amount = $i->amount + $amount;
                return;
            }
        }

        $cartProduct = new CartProduct();
        $product = new Product();
        $p = $product->getProductFromId($id);
        $cartProduct->amount = $amount;
        $cartProduct->product = $p;
        $_SESSION['cartList'][] = $cartProduct;
        return;
    }

}
