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
require_once($root . "/Plug_IT/controllers/Controller.php");

/**
 * Handle session request and call correct function
 * @author Daniëlle
 */
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