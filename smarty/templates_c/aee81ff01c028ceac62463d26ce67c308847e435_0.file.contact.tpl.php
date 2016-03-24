<?php
/* Smarty version 3.1.29, created on 2016-03-16 17:27:27
  from "C:\xampp\htdocs\Demo\Smarty\smarty\templates\contact.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e9896f691a46_84466810',
  'file_dependency' => 
  array (
    'aee81ff01c028ceac62463d26ce67c308847e435' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Demo\\Smarty\\smarty\\templates\\contact.tpl',
      1 => 1458145639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56e9896f691a46_84466810 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_3186256e9896f686897_82962779',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:contact.tpl */
function block_3186256e9896f686897_82962779($_smarty_tpl, $_blockParentStack) {
?>

    <h2>Contact</h2>
    
    <?php echo $_smarty_tpl->tpl_vars['model']->value;?>

<?php
}
/* {/block 'body'} */
}
