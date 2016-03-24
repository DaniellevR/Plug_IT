<?php
/* Smarty version 3.1.29, created on 2016-03-24 14:39:42
  from "C:\wamp\www\Smarty\smarty\templates\contact.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f3ee1e9dcc94_89540343',
  'file_dependency' => 
  array (
    '89f9108341013cc55d888ac0da35bf76db70910f' => 
    array (
      0 => 'C:\\wamp\\www\\Smarty\\smarty\\templates\\contact.tpl',
      1 => 1458145639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f3ee1e9dcc94_89540343 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2024956f3ee1e9d0dd1_04406952',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:contact.tpl */
function block_2024956f3ee1e9d0dd1_04406952($_smarty_tpl, $_blockParentStack) {
?>

    <h2>Contact</h2>
    
    <?php echo $_smarty_tpl->tpl_vars['model']->value;?>

<?php
}
/* {/block 'body'} */
}
