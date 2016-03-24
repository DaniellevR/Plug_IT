<?php
/* Smarty version 3.1.29, created on 2016-03-24 14:12:50
  from "C:\wamp\www\Smarty\smarty\templates\home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f3e7d234fc89_11129673',
  'file_dependency' => 
  array (
    'bd7cd97a27c0814c51d689d4313b3517f27f5c91' => 
    array (
      0 => 'C:\\wamp\\www\\Smarty\\smarty\\templates\\home.tpl',
      1 => 1458144978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f3e7d234fc89_11129673 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1418156f3e7d2341e36_08177853',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:home.tpl */
function block_1418156f3e7d2341e36_08177853($_smarty_tpl, $_blockParentStack) {
?>

    <h2>Home</h2>
    
    <?php echo $_smarty_tpl->tpl_vars['model']->value;?>

<?php
}
/* {/block 'body'} */
}
