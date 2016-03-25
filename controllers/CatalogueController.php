<?php

include('controllers/MainCtrl.php');
include('models/NavigationItem.php');
include('models/Category.php');

class CatalogueController extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        // Get navigation items
        $navi = $this->getNavigationItems();
        $sideNavigation = $this->getCategories();

        $smarty->assign('header', ['Inloggen', 'Verlanglijstje', 'Klantenservice']);
        $smarty->assign('navigation', $navi);
        $smarty->assign('categories', $sideNavigation);
        $smarty->assign('model', $model);
        $smarty->assign('footer', ['Informatie', 'Bestelling & levering', 'Betalen', 'Retourneren', 'Voorwaarden', 'Over', 'Contact']);
        $smarty->display($name . '.tpl');
    }

    public function getCategories() {
        $this->load->model('Category');
        $category = new Category();
        $categories = $category->getCategories();

        return $categories;
    }

    public function getChildCategoriesFromId($catId) {
        $this->load->model('Category');
        $category = new Category();
        $categories = $category->getChildCategoriesFromId($catId);

        return $categories;
    }

    public function getProductFromId($id) {
        $this->load->model('Product');
        $product = new Product();
        $outputProduct = $product->getProductFromId($id);

        return $outputProduct;
    }

    public function getProductFromCategoryId($catId) {
        $this->load->model('Product');
        $product = new Product();
        $products = $product->getProductsFromCategoryId($catId);

        return $products;
    }

}
