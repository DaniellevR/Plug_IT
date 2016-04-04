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

/**
 * Controller for text pages and login/register pages
 */
class Controller extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Set variables for usage in views
        // Action
        $action = "";
        if (isset($_SESSION["action"])) {
            $action = $_SESSION["action"];
            unset($_SESSION["action"]);
        }
        $smarty->assign('action', $action);

        // Errors
        $errors = "";
        if (isset($_SESSION["errors"])) {
            $errors = $_SESSION["errors"];
            unset($_SESSION["errors"]);
        }
        $smarty->assign('errors', $errors);
        
        // Further data
        $smarty->assign('page', $name);
        $smarty->assign('navigation', $this->getNavigationItems());
        $smarty->assign('categories', $this->getCategories());
        $smarty->assign('suppliers', $this->getSuppliers());
        $smarty->assign('users', $this->getUsers());
        $smarty->assign('roles', $this->getRoles());
        $smarty->display($name . '.tpl');
    }

}
