<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");

class Controller extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();

        $action = "";
        if (isset($_SESSION["action"])) {
            $action = $_SESSION["action"];
            unset($_SESSION["action"]);
        }
        $smarty->assign('action', $action);

        $errors = "";
        if (isset($_SESSION["errors"])) {
            $errors = $_SESSION["errors"];
            unset($_SESSION["errors"]);
        }
        $smarty->assign('errors', $errors);
        
        $smarty->assign('page', $name);

        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('suppliers', $this->getSuppliers());
        $smarty->assign('users', $this->getUsers());
        $smarty->assign('roles', $this->getRoles());

        $smarty->assign('model', $model);
        $smarty->display($name . '.tpl');
    }

}
