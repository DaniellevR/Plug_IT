<?php
/* Smarty version 3.1.29, created on 2016-04-03 20:16:30
  from "C:\xampp\htdocs\Plug_IT\smarty\templates\myAccount.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57015dfeb393a7_91848649',
  'file_dependency' => 
  array (
    '7ff1864a7d8e9cdff60cbd8d8c9cd77c9c2fd971' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\smarty\\templates\\myAccount.tpl',
      1 => 1459600610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:accountInfoForm.tpl' => 1,
  ),
),false)) {
function content_57015dfeb393a7_91848649 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2964457015dfeb32947_79118906',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'parent_block'}  file:myAccount.tpl */
function block_974957015dfeb35e94_78756513($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:accountInfoForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'body'}  file:myAccount.tpl */
function block_2964457015dfeb32947_79118906($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Mijn profiel</h1>
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_974957015dfeb35e94_78756513',
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
