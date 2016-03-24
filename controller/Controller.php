<?php

include('controller/MainCtrl.php');

/**
 * Created by PhpStorm.
 * User: Linksonder
 * Date: 3/24/2016
 * Time: 12:52 PM
 */
class Controller extends MainCtrl {

    function View($name, $model) {
        global $smarty;

        $smarty->assign('header', ['home', 'aboutMe', 'contact']);
        $smarty->assign('model', $model);
        $smarty->assign('footer', ['email@nu.nl', '0612345678']);
        $smarty->display($name . '.tpl');
    }

}
