<?php
/* Smarty version 3.1.29, created on 2016-03-20 03:22:35
  from "C:\xampp\htdocs\Plug_IT\Application\views\templates\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ee096b455595_73384103',
  'file_dependency' => 
  array (
    '152b402c7c839a1b5dec223d83e01dd6506b554c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\Application\\views\\templates\\header.tpl',
      1 => 1458434963,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ee096b455595_73384103 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 

    <head> 
        <title>Plug IT</title> 
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
" />
    </head>
    <body>
        <div class="sitecontainer">
            <div class="header">
                <div class="logintool">
                    <ul>
                        <li><a href="#">Gebruikersnaam</a></li>
                        <li><a href="#">Verlanglijst</a></li>
                        <li><a href="#">Klantenservice</a></li>
                        <li><a href="#">Uitloggen</a></li>
                    </ul>
                </div>

                <div class="path">
                    
                </div>

                <a href="<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="Plug IT.nl" /></a>

                <div class="search">
                    <form action="#" method="post">
                        <input id="searchBar" type="text" placeholder="Zoeken..." required/>
                        <input id="searchBarButton" type="button" value="Zoeken">
                    </form>
                </div>

                <div class="cart">
                    <a href="#">
                        <img id="shoppingCart" src="<?php echo $_smarty_tpl->tpl_vars['cart']->value;?>
" alt="Winkelmandje">
                    </a>
                </div>
            </div><?php }
}
