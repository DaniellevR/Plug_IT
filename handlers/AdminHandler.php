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
require_once($root . "/Plug_IT/controllers/AdminController.php");

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $adminCtrl = new AdminController();
    switch ($action) {
        case 'removeCategory' :
            $adminCtrl->removeCategory();
            break;
        case 'removeProduct' :
            $adminCtrl->removeProduct();
            break;
        case 'addUser' :
            $adminCtrl->addUser();
            break;
        case 'editUser' :
            $adminCtrl->editUser();
            break;
        case 'addOrder' :
            $adminCtrl->addOrder();
            break;
        case 'editOrder' :
            $adminCtrl->editOrder();
            break;
        case 'changeAmount' :
            $adminCtrl->changeAmount();
            break;
        case 'reset' :
            $adminCtrl->resetOrder();
            break;
    }
}