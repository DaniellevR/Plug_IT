<?php
/* Smarty version 3.1.29, created on 2016-03-16 17:27:24
  from "C:\xampp\htdocs\Demo\Smarty\smarty\templates\aboutMe.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e9896cca6160_84136705',
  'file_dependency' => 
  array (
    'f9c68c617155538421525640cff8164ce2aa2f6b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Demo\\Smarty\\smarty\\templates\\aboutMe.tpl',
      1 => 1458145642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56e9896cca6160_84136705 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
echo $_smarty_tpl->tpl_vars['nav']->value;?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1823256e9896cc9de02_63603076',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:aboutMe.tpl */
function block_1823256e9896cc9de02_63603076($_smarty_tpl, $_blockParentStack) {
?>

    <h2>About Me</h2>
    
    <?php echo $_smarty_tpl->tpl_vars['model']->value;?>

<?php
}
/* {/block 'body'} */
}
