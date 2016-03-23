<?php

defined('BASEPATH') OR exit('No direct script access allowed');

define('SMARTY_DIR', 'System/libraries/smarty/');
require SMARTY_DIR . 'Smarty.class.php';

class AdminController extends CI_Controller {

    protected $data = array();

    public function index() {
        $this->render_page('index', '');
    }

    function __construct() {
        parent::__construct();
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
        
        $this->load->helper('url');
        redirect(base_url("index.php/Welcome/admin"));
    }
}
