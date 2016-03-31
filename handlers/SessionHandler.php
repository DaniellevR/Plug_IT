<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/controllers/Controller.php");

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $ctrl = new Controller();
    switch ($action) {
        case 'login' :
            $ctrl->loginUser();
            break;
        case 'logout' :
            $ctrl->logoutUser();
            break;
    }
}