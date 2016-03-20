<?php

defined('BASEPATH') OR exit('No direct script access allowed');

define('SMARTY_DIR', 'System/libraries/smarty/');
require SMARTY_DIR . 'Smarty.class.php';

class Welcome extends CI_Controller {

    protected $data = array();

    public function index() {
        $this->render_page('index', '');
    }

    function __construct() {
        parent::__construct();
    }

    function render_page($view) {
        // Smarty
        $smarty = new Smarty();
        $smarty->template_dir = 'Application/views/templates';
        $smarty->compile_dir = 'Application/views/templates_c';

        // Styling
        $this->load->helper('url');
        $style = base_url() . 'assets/css/style.css';
        $logo = base_url() . 'assets/pix/logo.png';
        $cart = base_url() . 'assets/pix/cart.png';
        $smarty->assign('style', $style);
        $smarty->assign('logo', $logo);
        $smarty->assign('cart', $cart);

        // Pages
//        $smarty->assign('add_C', base_url() . "index.php/Welcome/AdminController/addCategory");
        $smarty->assign('home', base_url() . 'index.php/Welcome/render_page/index');
        $smarty->assign('information', base_url() . 'index.php/Welcome/render_page/information');
        $smarty->assign('orderAndDeliviry', base_url() . 'index.php/Welcome/render_page/orderAndDeliviry');
        $smarty->assign('paymentInfo', base_url() . 'index.php/Welcome/render_page/paymentInfo');
        $smarty->assign('retourInfo', base_url() . 'index.php/Welcome/render_page/retourInfo');
        $smarty->assign('conditions', base_url() . 'index.php/Welcome/render_page/conditions');
        $smarty->assign('contact', base_url() . 'index.php/Welcome/render_page/contact');
        $smarty->assign('about', base_url() . 'index.php/Welcome/render_page/about');
        $smarty->assign('admin', base_url() . 'index.php/Welcome/render_page/admin');

        $smarty->assign('catalogue', base_url() . 'index.php/Welcome/render_page/catalogue');
        $smarty->assign('categorypage', base_url() . 'index.php/Welcome/render_page/category');
        $smarty->assign('productpage', base_url() . 'index.php/Welcome/render_page/productpage');

        // Data
//        $smarty->registerPlugin("function", "render", "render_page");

        $smarty->assign('categories', $this->getParentAndChildCategories());

        // Display
        $smarty->display($view . '.tpl');
    }

    function getParentAndChildCategories() {
        $this->load->model('Category');
        $categoryModel = new Category();
        $categories = $categoryModel->getCategories();

        $catalogue_catagories = array();
        $children = array();

        $navigation = array();

        // Sort
        foreach ($categories as $cat) {
            if (is_null($cat->parent)) {
                $catalogue_catagories[] = $cat;
            } else {
                $children[] = $cat;
            }
        }

        $navigation[] = $catalogue_catagories;
        $navigation[] = $children;

        return $navigation;
    }
}
