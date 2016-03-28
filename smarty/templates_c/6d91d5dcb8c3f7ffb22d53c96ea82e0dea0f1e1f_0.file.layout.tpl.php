<?php
/* Smarty version 3.1.29, created on 2016-03-28 03:39:44
  from "C:\xampp\htdocs\Plug_IT\smarty\templates\layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f88b604d3414_49425535',
  'file_dependency' => 
  array (
    '6d91d5dcb8c3f7ffb22d53c96ea82e0dea0f1e1f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\smarty\\templates\\layout.tpl',
      1 => 1459129181,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f88b604d3414_49425535 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
    <head> 
        <title><?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_561956f88b6042da79_46190062',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="/Plug_IT/assets/css/style.css" />
    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'head', array (
  0 => 'block_478456f88b6043b807_04450583',
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
                        <li><a href="/Plug_IT/index.php?page=<?php echo $_smarty_tpl->tpl_vars['nav']->value->page;?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value->name;?>
</a></li>
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
                <a>Path</a>
            </div>

            <a href="/Plug_IT/index.php?page=Home"> <img src="/Plug_IT/assets/pix/logo.png" alt="Plug IT.nl" /></a>

            <div class="search">
                <form action="/Plug_IT/index.php?page=Catalogue" method="get">
                    <input id="searchBar" type="text" name="searchKeywords" placeholder="Zoeken..." required/>
                    <input name="page" value="Catalogue" hidden/>
                    <input id="searchBarButton" type="submit" value="Zoeken"/>
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
$__foreach_parent_1_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_1_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                        <a href="/Plug_IT/index.php?page=Category"><li><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</li></a>
                        <ul>
                            <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_2_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_2_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['child']->value->parent == $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                    <a href="/Plug_IT/index.php?page=Category"><li><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</li></a>
                                        <?php }?>
                                    <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_2_saved_local_item;
}
if ($__foreach_child_2_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_2_saved_item;
}
?>
                        </ul>
                    <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_1_saved_local_item;
}
if ($__foreach_parent_1_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_1_saved_item;
}
?>
                </ul>
            </div>
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1770556f88b604adc86_71936991',
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
$__foreach_nav_3_saved_item = isset($_smarty_tpl->tpl_vars['nav']) ? $_smarty_tpl->tpl_vars['nav'] : false;
$_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['nav']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->value) {
$_smarty_tpl->tpl_vars['nav']->_loop = true;
$__foreach_nav_3_saved_local_item = $_smarty_tpl->tpl_vars['nav'];
?>
                <li><a href="/Plug_IT/index.php?page=<?php echo $_smarty_tpl->tpl_vars['nav']->value->page;?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value->name;?>
</a></li>
                <?php
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_3_saved_local_item;
}
if ($__foreach_nav_3_saved_item) {
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_3_saved_item;
}
?>
        </ul>
    </div>
</div>
</body>
</html>
<?php }
/* {block 'title'}  file:layout.tpl */
function block_561956f88b6042da79_46190062($_smarty_tpl, $_blockParentStack) {
?>
Plug IT<?php
}
/* {/block 'title'} */
/* {block 'head'}  file:layout.tpl */
function block_478456f88b6043b807_04450583($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'head'} */
/* {block 'body'}  file:layout.tpl */
function block_1770556f88b604adc86_71936991($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'body'} */
}
