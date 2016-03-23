<?php
/* Smarty version 3.1.29, created on 2016-03-23 01:38:31
  from "C:\wamp\www\Plug_IT\Application\views\templates\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f1e587a9ab59_01072907',
  'file_dependency' => 
  array (
    'ca93c0503e819dcee23ddd4aac83f3ff7757b7e5' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\Application\\views\\templates\\header.tpl',
      1 => 1458693508,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f1e587a9ab59_01072907 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'System/libraries/smarty/plugins\\modifier.replace.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
    <head> 
        <title>Plug IT</title> 
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
" />
        <?php echo '<script'; ?>
>
            $('.nav ul li').click(function() {
                $(this).parent().find('ul').toggle();
            });
        <?php echo '</script'; ?>
>
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
                    
                    <a href=<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
>Home</a>
                    <?php if (isset($_GET['category'])) {?>
                        > <a href=<?php echo $_smarty_tpl->tpl_vars['categorypage']->value;?>
?category=<?php echo smarty_modifier_replace($_GET['category'],' ','+');?>
><?php echo $_GET['category'];?>
</a>
                        <?php if (isset($_GET['subcategory'])) {?>
                            > <a href=<?php echo $_smarty_tpl->tpl_vars['categorypage']->value;?>
?category=<?php echo smarty_modifier_replace($_GET['category'],' ','+');?>
&subcategory=<?php echo smarty_modifier_replace($_GET['subcategory'],' ','+');?>
><?php echo $_GET['subcategory'];?>
</a>
                            <?php if (isset($_GET['product'])) {?>
                                > <a href=<?php echo $_smarty_tpl->tpl_vars['productpage']->value;?>
?category=<?php echo smarty_modifier_replace($_GET['category'],' ','+');?>
&subcategory=<?php echo smarty_modifier_replace($_GET['subcategory'],' ','+');?>
&product=<?php echo smarty_modifier_replace($_GET['product'],' ','+');?>
><?php echo $_GET['product'];?>
</a>
                            <?php }?>
                        <?php }?>
                    <?php }?>
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
