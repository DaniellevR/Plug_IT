<?php

include('controller/Controller.php');
include('lib/smarty/libs/Smarty.class.php');

$smarty = new Smarty;
$smarty->setTemplateDir('smarty/templates');
$smarty->setCompileDir('smarty/templates_c');
$smarty->setCacheDir('smarty/cache');
$smarty->setConfigDir('smarty/configs');

$controller = new Controller();

if(isset($_GET['method']))
{
    $method = $_GET['method'];
    $controller->{$method}();
} else {
    $controller->Home();
}
?>