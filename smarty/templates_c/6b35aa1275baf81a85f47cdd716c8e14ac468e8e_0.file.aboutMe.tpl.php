<?php
/* Smarty version 3.1.29, created on 2016-03-24 16:26:02
  from "C:\wamp\www\Plug_IT\smarty\templates\aboutMe.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f4070aa499b8_18268165',
  'file_dependency' => 
  array (
    '6b35aa1275baf81a85f47cdd716c8e14ac468e8e' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\aboutMe.tpl',
      1 => 1458145642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f4070aa499b8_18268165 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
echo $_smarty_tpl->tpl_vars['nav']->value;?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1621556f4070aa41619_24568677',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:aboutMe.tpl */
function block_1621556f4070aa41619_24568677($_smarty_tpl, $_blockParentStack) {
?>

    <h2>About Me</h2>
    
    <?php echo $_smarty_tpl->tpl_vars['model']->value;?>

<?php
}
/* {/block 'body'} */
}
