<?php
/* Smarty version 3.1.29, created on 2016-04-02 14:16:06
  from "C:\wamp\www\Plug_IT\smarty\templates\usersforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ffb806b17091_94913786',
  'file_dependency' => 
  array (
    '318e80216c9bc2196cb058a2a72b0656aadbff9c' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\usersforms.tpl',
      1 => 1459550817,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
    'file:registerform.tpl' => 1,
    'file:accountInfoForm.tpl' => 1,
  ),
),false)) {
function content_56ffb806b17091_94913786 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'usersforms', array (
  0 => 'block_2989156ffb806af69f1_38834288',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'parent_block'}  file:usersforms.tpl */
function block_2080056ffb806afec96_29564641($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:registerform.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'parent_block'}  file:usersforms.tpl */
function block_1855356ffb806b0b920_15123010($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:accountInfoForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'usersforms'}  file:usersforms.tpl */
function block_2989156ffb806af69f1_38834288($_smarty_tpl, $_blockParentStack) {
?>

    <div class="adminpart">
    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_2080056ffb806afec96_29564641',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>

    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_1855356ffb806b0b920_15123010',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>

</div>
<?php
}
/* {/block 'usersforms'} */
}
