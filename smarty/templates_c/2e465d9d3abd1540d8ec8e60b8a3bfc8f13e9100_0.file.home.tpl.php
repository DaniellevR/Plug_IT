<?php
/* Smarty version 3.1.29, created on 2016-03-24 16:25:58
  from "C:\wamp\www\Plug_IT\smarty\templates\home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f40706a33ee4_89321095',
  'file_dependency' => 
  array (
    '2e465d9d3abd1540d8ec8e60b8a3bfc8f13e9100' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\home.tpl',
      1 => 1458144978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f40706a33ee4_89321095 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2418156f40706a27953_44742538',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:home.tpl */
function block_2418156f40706a27953_44742538($_smarty_tpl, $_blockParentStack) {
?>

    <h2>Home</h2>
    
    <?php echo $_smarty_tpl->tpl_vars['model']->value;?>

<?php
}
/* {/block 'body'} */
}
