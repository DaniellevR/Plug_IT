<?php
/* Smarty version 3.1.29, created on 2016-04-01 22:26:48
  from "C:\wamp\www\Plug_IT\smarty\templates\layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fed9881ca201_50078746',
  'file_dependency' => 
  array (
    'bb0308ddaa30b162f7ec483cf35c26cc0e7708d3' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\layout.tpl',
      1 => 1459542221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fed9881ca201_50078746 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
    <head> 
        <title><?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_1921356fed9880a24c6_91907107',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="/Plug_IT/assets/css/style.css" />
        <?php echo '<script'; ?>
 type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/Plug_IT/assets/js/functionCalls.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'head', array (
  0 => 'block_685056fed9880aa0e3_28770201',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

</head>
<body>
    <div class="sitecontainer">
        <div class="header">
            <div class="logintool">
                <ul>
                    <?php
$_from = $_smarty_tpl->tpl_vars['navigation']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_nav_0_saved_item = isset($_smarty_tpl->tpl_vars['nav']) ? $_smarty_tpl->tpl_vars['nav'] : false;
$_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['nav']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->value) {
$_smarty_tpl->tpl_vars['nav']->_loop = true;
$__foreach_nav_0_saved_local_item = $_smarty_tpl->tpl_vars['nav'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['nav']->value->name === "Inloggen") {?>
                            <?php if (!isset($_SESSION['usertype'])) {?>
                                <li><a href="/Plug_IT/index.php?page=<?php echo $_smarty_tpl->tpl_vars['nav']->value->page;?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value->name;?>
</a></li>
                                <?php }?>
                            <?php } elseif ($_smarty_tpl->tpl_vars['nav']->value->name === "Mijn account") {?>
                                <?php if (isset($_SESSION['usertype'])) {?>
                                <li><a href="/Plug_IT/index.php?page=<?php echo $_smarty_tpl->tpl_vars['nav']->value->page;?>
"><?php echo $_SESSION['username'];?>
</a></li>
                                <?php }?>
                            <?php } elseif ($_smarty_tpl->tpl_vars['nav']->value->name === "Uitloggen") {?>
                                <?php if (isset($_SESSION['usertype'])) {?>
                                <li><a onclick="logout(this, event);" href=""><?php echo $_smarty_tpl->tpl_vars['nav']->value->name;?>
</a></li>
                                <?php }?>
                            <?php } else { ?>
                            <li><a href="/Plug_IT/index.php?page=<?php echo $_smarty_tpl->tpl_vars['nav']->value->page;?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value->name;?>
</a></li>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_0_saved_local_item;
}
if ($__foreach_nav_0_saved_item) {
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_0_saved_item;
}
?>
                </ul>
            </div>

            <div class="path">
                <?php if (isset($_GET['page'])) {?>
                    <?php if ($_GET['page'] === "Home") {?>
                        <a href='/Plug_IT/index.php?page=Home'>Home</a>
                    <?php } else { ?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['navigation']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_headeritem_1_saved_item = isset($_smarty_tpl->tpl_vars['headeritem']) ? $_smarty_tpl->tpl_vars['headeritem'] : false;
$_smarty_tpl->tpl_vars['headeritem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['headeritem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['headeritem']->value) {
$_smarty_tpl->tpl_vars['headeritem']->_loop = true;
$__foreach_headeritem_1_saved_local_item = $_smarty_tpl->tpl_vars['headeritem'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['headeritem']->value->page === $_GET['page']) {?>
                                <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page=<?php echo $_GET['page'];?>
'><?php echo $_smarty_tpl->tpl_vars['headeritem']->value->name;?>
</a>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['headeritem'] = $__foreach_headeritem_1_saved_local_item;
}
if ($__foreach_headeritem_1_saved_item) {
$_smarty_tpl->tpl_vars['headeritem'] = $__foreach_headeritem_1_saved_item;
}
?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['navigation']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_footeritem_2_saved_item = isset($_smarty_tpl->tpl_vars['footeritem']) ? $_smarty_tpl->tpl_vars['footeritem'] : false;
$_smarty_tpl->tpl_vars['footeritem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['footeritem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['footeritem']->value) {
$_smarty_tpl->tpl_vars['footeritem']->_loop = true;
$__foreach_footeritem_2_saved_local_item = $_smarty_tpl->tpl_vars['footeritem'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['footeritem']->value->page === $_GET['page']) {?>
                                <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page=<?php echo $_GET['page'];?>
'><?php echo $_smarty_tpl->tpl_vars['footeritem']->value->name;?>
</a>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['footeritem'] = $__foreach_footeritem_2_saved_local_item;
}
if ($__foreach_footeritem_2_saved_item) {
$_smarty_tpl->tpl_vars['footeritem'] = $__foreach_footeritem_2_saved_item;
}
?>
                    <?php }?>
                <?php }?>
            </div>

            <a href="/Plug_IT/index.php?page=Home"> <img src="/Plug_IT/assets/pix/logo.png" alt="Plug IT.nl" /></a>

            <div class="search">
                <form action="#" method="post">
                    <input id="searchBar" type="text" placeholder="Zoeken..." required/>
                    <input id="searchBarButton" type="button" value="Zoeken">
                </form>
            </div>

            <div class="cart">
                <a href="/Plug_IT/index.php?page=Cart">
                    <img id="shoppingCart" src="/Plug_IT/assets/pix/cart.png" alt="Winkelmandje">
                </a>
            </div>
        </div>
        <div class="content_container">
            <div class="navigation">
                <ul class="nav">
                    <a href="/Plug_IT/index.php?page=Catalogue">Catalogus</a>
                    <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_3_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_3_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                        <a href="/Plug_IT/index.php?page=Category"><li><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</li></a>
                        <ul>
                            <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_4_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_4_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['child']->value->parent == $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                    <a href="/Plug_IT/index.php?page=Category"><li><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</li></a>
                                        <?php }?>
                                    <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_4_saved_local_item;
}
if ($__foreach_child_4_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_4_saved_item;
}
?>
                        </ul>
                    <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_3_saved_local_item;
}
if ($__foreach_parent_3_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_3_saved_item;
}
?>
                </ul>
            </div>
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1249956fed9881aa2b4_04327077',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

    </div>
    <div class="footer">
        <ul class="footer_nav">
            <?php
$_from = $_smarty_tpl->tpl_vars['navigation']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_nav_5_saved_item = isset($_smarty_tpl->tpl_vars['nav']) ? $_smarty_tpl->tpl_vars['nav'] : false;
$_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['nav']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->value) {
$_smarty_tpl->tpl_vars['nav']->_loop = true;
$__foreach_nav_5_saved_local_item = $_smarty_tpl->tpl_vars['nav'];
?>
                <li><a href="/Plug_IT/index.php?page=<?php echo $_smarty_tpl->tpl_vars['nav']->value->page;?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value->name;?>
</a></li>
                <?php
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_5_saved_local_item;
}
if ($__foreach_nav_5_saved_item) {
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_5_saved_item;
}
?>
        </ul>
    </div>
</div>
</body>
</html>
<?php }
/* {block 'title'}  file:layout.tpl */
function block_1921356fed9880a24c6_91907107($_smarty_tpl, $_blockParentStack) {
?>
Plug IT<?php
}
/* {/block 'title'} */
/* {block 'head'}  file:layout.tpl */
function block_685056fed9880aa0e3_28770201($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'head'} */
/* {block 'body'}  file:layout.tpl */
function block_1249956fed9881aa2b4_04327077($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'body'} */
}
