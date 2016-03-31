<?php
/* Smarty version 3.1.29, created on 2016-03-31 16:28:41
  from "C:\wamp\www\Plug_IT\smarty\templates\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd3419194b81_97672829',
  'file_dependency' => 
  array (
    '2fb03d898abba0576ed44abeb7ac9f15ffa64f12' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\login.tpl',
      1 => 1459433304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:loginform.tpl' => 1,
  ),
),false)) {
function content_56fd3419194b81_97672829 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_712656fd3419180b64_51816093',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'parent_block'}  file:login.tpl */
function block_1595956fd3419188094_80127118($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:loginform.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'body'}  file:login.tpl */
function block_712656fd3419180b64_51816093($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Inloggen</h1>
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_1595956fd3419188094_80127118',
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
