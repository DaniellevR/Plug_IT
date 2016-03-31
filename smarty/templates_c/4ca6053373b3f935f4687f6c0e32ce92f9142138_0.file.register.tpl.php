<?php
/* Smarty version 3.1.29, created on 2016-03-31 22:06:13
  from "C:\wamp\www\Plug_IT\smarty\templates\register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd8335187ac9_20363363',
  'file_dependency' => 
  array (
    '4ca6053373b3f935f4687f6c0e32ce92f9142138' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\register.tpl',
      1 => 1459433328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:registerform.tpl' => 1,
  ),
),false)) {
function content_56fd8335187ac9_20363363 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1457456fd83351736c7_62094837',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'parent_block'}  file:register.tpl */
function block_2907156fd833517b931_89384956($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:registerform.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'body'}  file:register.tpl */
function block_1457456fd83351736c7_62094837($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Registreren</h1>
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_2907156fd833517b931_89384956',
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
