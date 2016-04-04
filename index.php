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
require_once($root . "/controllers/Controller.php");
require_once($root . "/controllers/AdminController.php");
require_once($root . "/controllers/CatalogueController.php");
require_once($root . "/controllers/ProductController.php");
require_once($root . "/controllers/ShoppingcartController.php");
require_once($root . "/controllers/OrderAndDeliveryController.php");
include('lib/smarty/libs/Smarty.class.php');

// Smarty
$smarty = new Smarty;
$smarty->setTemplateDir('smarty/templates');
$smarty->setCompileDir('smarty/templates_c');
$smarty->setCacheDir('smarty/cache');
$smarty->setConfigDir('smarty/configs');

// Check page and start the correct controller
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page === 'Admin') {
        $page = 'AdminCategories';
    }

    if ($page == 'Catalogue') {
        $controller = new CatalogueController();
    } else if ($page == 'Product') {
        $controller = new ProductController();
    } else if ($page == 'Cart') {
        $controller = new ShoppingcartController();
    } else if ($page == 'OrderAndDelivery') {
        $controller = new OrderAndDeliveryController();
    } else if ($page === 'AdminCategories' || $page === 'AdminProducts' || $page === 'AdminUsers' || $page === 'AdminOrders') {
        $controller = new AdminController();
    } else {
        $controller = new Controller();
    }

    if (method_exists($controller, $page)) {
        $controller->{$page}();
    } else {
        header("Location: /Plug_IT/index.php?page=Home");
    }
} else {
    $controller = new Controller();
    $controller->Home();
}
?>