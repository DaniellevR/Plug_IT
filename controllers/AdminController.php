<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");

class AdminController extends MainCtrl {

//    $objSmarty->assign("common", $objectname);

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();

        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('model', $model);
        $smarty->assign("controller", $this);
        $smarty->assign('footer', ['Informatie', 'Bestelling & levering', 'Betalen', 'Retourneren', 'Voorwaarden', 'Over', 'Contact']);
        $smarty->display($name . '.tpl');
    }
    
    public function test($id) {
        echo "Dit is de test functie met id : " . $id;
    }

    public function addCategory() {
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
//            $file_type = $_FILES['image']['type'];
            $file_ext = explode(".", $file_name);
            $file_ext = end($file_ext);
            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                // db
//        require_once 'Database.php';
//        $db = new Database();
//        $generated_id = $db->addCategory($_POST['categoryname'], $_POST['category_description'], $_POST['formParentCategories']);
                $generated_id = 1;
                if (!is_dir("/categories/")) {
                    mkdir("/categories/");
                }
                move_uploaded_file($file_tmp, "/categories/" . $generated_id . "." . $file_ext); //$file_name);
            } else {
                print_r($errors);
            }
        }

//        $this->load->helper('url');
//        redirect(base_url("index.php/Welcome/admin"));

//        $this->About();
    }

}
