<?php
/* Smarty version 3.1.29, created on 2016-03-24 14:39:40
  from "C:\wamp\www\Smarty\smarty\templates\aboutMe.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f3ee1c904f84_27678871',
  'file_dependency' => 
  array (
    '4408a908c42b3ad5dbe9bf3cb87104de327d8eaa' => 
    array (
      0 => 'C:\\wamp\\www\\Smarty\\smarty\\templates\\aboutMe.tpl',
      1 => 1458145642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f3ee1c904f84_27678871 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
echo $_smarty_tpl->tpl_vars['nav']->value;?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1289956f3ee1c8fc6c8_25613925',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:aboutMe.tpl */
function block_1289956f3ee1c8fc6c8_25613925($_smarty_tpl, $_blockParentStack) {
?>

    <h2>About Me</h2>
    
    <?php echo $_smarty_tpl->tpl_vars['model']->value;?>

<?php
}
/* {/block 'body'} */
}
