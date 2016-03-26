<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");
require_once($root . "/Plug_IT/models/Category.php");

class AdminController extends MainCtrl {

//    $objSmarty->assign("common", $objectname);

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();

//        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('model', $model);
        $smarty->assign('footer', ['Informatie', 'Bestelling & levering', 'Betalen', 'Retourneren', 'Voorwaarden', 'Over', 'Contact']);
        $smarty->display($name . '.tpl');
    }

    public function addCategory() {
        if (isset($_POST['category']) && isset($_POST['description']) && isset($_POST['parent'])) {
            $categoryModel = new Category();
            $id = $categoryModel->addCategory($_POST['category'], $_POST['description'], $_POST['parent']);
            echo $id;
        }
    }

    public function editCategory() {
        
    }

    public function removeCategory() {
        
    }

    public function addProduct() {
        
    }

    public function editProduct() {
        
    }

    public function removeProduct() {
        
    }

    public function addUser() {
        
    }

    public function removeUser() {
        
    }

    public function addOrder() {
        
    }

    public function removeOrder() {
        
    }

}
