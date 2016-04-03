<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");

class OrderAndDeliveryController extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();
//        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        if (isset($_SESSION['username']) && isset($_SESSION['usertype'])) {
            $username = $_SESSION['username'];
            $usertype = $_SESSION['usertype'];
        }
        if (isset($_SESSION['cartList'])) {
            $cartList = $_SESSION['cartList'];
        }
        if (isset($_GET['confirmed'])) {
            $confirmed = true;
            $this->orderConfirmed();
        }
        if (isset($username) && isset($usertype)) {
            $smarty->assign('username', $username);
            $smarty->assign('usertype', $usertype);
        }
        if (isset($confirmed)) {
            $smarty->assign('confirmed', $confirmed);
        }
        if (isset($cartList)) {
            $smarty->assign('cartList', $cartList);
        }
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('model', $model);
        $smarty->assign("controller", $this);
        $smarty->assign('footer', ['Informatie', 'Bestelling & levering', 'Betalen', 'Retourneren', 'Voorwaarden', 'Over', 'Contact']);
        $smarty->display($name . '.tpl');
    }

    public function orderConfirmed() {
        $order = new Order();

        $total = 0;

        foreach ($_SESSION['cartList'] as $product) {
            $total = $total + ($product->amount * $product->product->price);
        }

        $orderId = $order->createOrder($total, $_SESSION['username']);

        $order->createOrderHasProduct($orderId, $_SESSION['cartList']);

        unset($_SESSION['cartList']);
    }

}
