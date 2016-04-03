<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/MainCtrl.php");
require_once($root . "/Plug_IT/models/Category.inc.php");
require_once($root . "/Plug_IT/models/Product.inc.php");

class CatalogueController extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();
        $allCategories = $this->getAllCategories();
        if (isset($_GET['id'])) {
            $childCategories = $this->getChildCategoriesFromId($_GET['id']);
            $products = $this->getProductsFromCategoryId($_GET['id']);
        }
        if (isset($_GET['searchKeywords'])) {
            $productsFound = $this->getProductsByKeywords($_GET['searchKeywords']);
            $smarty->assign('productsFound', $productsFound);
        }

//        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('allCategories', $allCategories);
        if (isset($_GET['id'])) {
            $smarty->assign('childCategories', $childCategories);
            $smarty->assign('products', $products);
        }
        $smarty->assign('model', $model);
        $smarty->assign("controller", $this);
        $smarty->display($name . '.tpl');
    }

    public function getAllCategories() {
        $category = new Category();
        $allCategories = $category->getCategories();

        return $allCategories;
    }

    public function getChildCategoriesFromId($catId) {
        $category = new Category();
        $childCategories = $category->getChildCategoriesFromId($catId);

        return $childCategories;
    }

    public function getProductFromId($id) {
        $product = new Product();
        $outputProduct = $product->getProductFromId($id);

        return $outputProduct;
    }

    public function getProductsFromCategoryId($catId) {
        $product = new Product();
        $category = new Category();
        $allProducts = $product->getProducts();
        $allCategories = $category->getCategories();

        $categoriesToSearch = array();

        $categoriesToSearch[] = $catId;

        foreach ($allCategories as $cat) {
            if ($cat->parent == $catId) {
                $categoriesToSearch[] = $cat->id;
            }
        }

        $products = array();

        foreach ($allProducts as $p) {
            foreach ($categoriesToSearch as $cat) {
                if ($p->categoryId == $cat) {
                    $products[] = $p;
                }
            }
        }

        return $products;
    }

}
