<?php
/* Smarty version 3.1.29, created on 2016-04-02 14:00:15
  from "C:\wamp\www\Plug_IT\smarty\templates\myAccount.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ffb44fd935a5_88753023',
  'file_dependency' => 
  array (
    '4b126936c46827343aabd7dc693ac2906703862d' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\myAccount.tpl',
      1 => 1459550746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:accountInfoForm.tpl' => 1,
  ),
),false)) {
function content_56ffb44fd935a5_88753023 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2503656ffb44fd7f716_55046467',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'parent_block'}  file:myAccount.tpl */
function block_3176556ffb44fd86cf0_75004960($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:accountInfoForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'body'}  file:myAccount.tpl */
function block_2503656ffb44fd7f716_55046467($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Mijn profiel</h1>
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_3176556ffb44fd86cf0_75004960',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>

    </div>
<?php
}
/* {/block 'body'} */
}
