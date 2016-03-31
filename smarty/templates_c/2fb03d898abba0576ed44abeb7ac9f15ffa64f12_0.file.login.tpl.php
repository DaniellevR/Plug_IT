<?php
/* Smarty version 3.1.29, created on 2016-03-30 15:46:45
  from "C:\wamp\www\Plug_IT\smarty\templates\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fbd8c50ab127_06166133',
  'file_dependency' => 
  array (
    '2fb03d898abba0576ed44abeb7ac9f15ffa64f12' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\login.tpl',
      1 => 1459345424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:loginform.tpl' => 1,
  ),
),false)) {
function content_56fbd8c50ab127_06166133 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2397856fbd8c5097127_49329200',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'parent_block'}  file:login.tpl */
function block_2396356fbd8c509e4e8_05581893($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:loginform.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'body'}  file:login.tpl */
function block_2397856fbd8c5097127_49329200($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Inloggen</h1>
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_2396356fbd8c509e4e8_05581893',
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
