<?php
/* Smarty version 3.1.29, created on 2016-04-01 21:29:26
  from "C:\wamp\www\Plug_IT\smarty\templates\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fecc16223622_11279025',
  'file_dependency' => 
  array (
    '88834233b4183b2e4e76ec176ae20331b0c98e41' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\admin.tpl',
      1 => 1459538783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:loginform.tpl' => 1,
  ),
),false)) {
function content_56fecc16223622_11279025 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1870656fecc161742c2_81026848',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'categoriesforms'}  file:admin.tpl */
function block_1865956fecc161ec614_47028029($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'categoriesforms'} */
/* {block 'productsforms'}  file:admin.tpl */
function block_2531256fecc161f7225_56175400($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'productsforms'} */
/* {block 'usersforms'}  file:admin.tpl */
function block_245756fecc161fe4a8_14795812($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'usersforms'} */
/* {block 'ordersforms'}  file:admin.tpl */
function block_2569456fecc16205627_19905566($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'ordersforms'} */
/* {block 'parent_block'}  file:admin.tpl */
function block_415956fecc1620ff69_61146764($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:loginform.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'body'}  file:admin.tpl */
function block_1870656fecc161742c2_81026848($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content admin">
        <h1 class="test">Admin</h1>
        
        <?php if ($_smarty_tpl->tpl_vars['errors']->value !== '' && $_smarty_tpl->tpl_vars['errors']->value !== "Gebruikersnaam en/of wachtwoord is onjuist." && $_smarty_tpl->tpl_vars['errors']->value !== "Er is iets misgegaan bij het inloggen. Probeer het opnieuw.") {?>
            <div class="error">
                <?php echo $_smarty_tpl->tpl_vars['errors']->value;?>

            </div>
        <?php }?>

        <?php if (isset($_COOKIE['PHPSESSID']) && isset($_SESSION['usertype']) && $_SESSION['usertype'] === "Administrator") {?>
            <ul class="adminpnl">
                <?php if ($_GET['page'] === 'AdminCategories') {?>
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminCategories">Categorieën</a></li>
                    <?php } else { ?>
                    <li><a href="/Plug_IT/index.php?page=AdminCategories">Categorieën</a></li>
                    <?php }?>
                    <?php if ($_GET['page'] === 'AdminProducts') {?>
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminProducts">Producten</a></li>
                    <?php } else { ?>
                    <li><a href="/Plug_IT/index.php?page=AdminProducts">Producten</a></li>
                    <?php }?>
                    <?php if ($_GET['page'] === 'AdminUsers') {?>
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminUsers">Gebruikers</a></li>
                    <?php } else { ?>
                    <li><a href="/Plug_IT/index.php?page=AdminUsers">Gebruikers</a></li>
                    <?php }?>
                    <?php if ($_GET['page'] === 'AdminOrders') {?>
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminOrders">Orders</a></li>
                    <?php } else { ?>
                    <li><a href="/Plug_IT/index.php?page=AdminOrders">Orders</a></li>
                    <?php }?>
            </ul>

        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'categoriesforms', array (
  0 => 'block_1865956fecc161ec614_47028029',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>


    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'productsforms', array (
  0 => 'block_2531256fecc161f7225_56175400',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'usersforms', array (
  0 => 'block_245756fecc161fe4a8_14795812',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'ordersforms', array (
  0 => 'block_2569456fecc16205627_19905566',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>


<?php } else {
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_415956fecc1620ff69_61146764',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>


<?php }?>
</div>
<?php
}
/* {/block 'body'} */
}
