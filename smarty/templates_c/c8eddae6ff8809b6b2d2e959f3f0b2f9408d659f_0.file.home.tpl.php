<?php
/* Smarty version 3.1.29, created on 2016-03-16 17:16:20
  from "C:\xampp\htdocs\Demo\Smarty\smarty\templates\home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e986d4f2ee43_05971691',
  'file_dependency' => 
  array (
    'c8eddae6ff8809b6b2d2e959f3f0b2f9408d659f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Demo\\Smarty\\smarty\\templates\\home.tpl',
      1 => 1458144978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56e986d4f2ee43_05971691 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_929056e986d4f10830_08282708',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:home.tpl */
function block_929056e986d4f10830_08282708($_smarty_tpl, $_blockParentStack) {
?>

    <h2>Home</h2>
    
    <?php echo $_smarty_tpl->tpl_vars['model']->value;?>

<?php
}
/* {/block 'body'} */
}
