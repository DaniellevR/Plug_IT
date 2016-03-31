<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/NavigationItem.php");
require_once($root . "/Plug_IT/controllers/Controller.php");
require_once($root . "/Plug_IT/controllers/CatalogueController.php");
require_once($root . "/Plug_IT/controllers/ProductController.php");
require_once($root . "/Plug_IT/controllers/ShoppingcartController.php");
require_once($root . "/Plug_IT/controllers/OrderAndDeliveryController.php");
include('lib/smarty/libs/Smarty.class.php');

$smarty = new Smarty;
$smarty->setTemplateDir('smarty/templates');
$smarty->setCompileDir('smarty/templates_c');
$smarty->setCacheDir('smarty/cache');
$smarty->setConfigDir('smarty/configs');

//$controller = new Controller();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'Catalogue') {
        $controller = new CatalogueController();
    } else if ($page == 'Product') {
        $controller = new ProductController();
    } else if ($page == 'Cart') {
        $controller = new ShoppingcartController();
    } else if ($page == 'OrderAndDelivery') {
        $controller = new OrderAndDeliveryController();
    } else {
        $controller = new Controller();
    }
    $controller->{$page}();
} else {
    $controller = new Controller();
    $controller->Home();
}
?>