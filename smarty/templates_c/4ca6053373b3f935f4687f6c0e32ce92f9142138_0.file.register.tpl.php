<?php
/* Smarty version 3.1.29, created on 2016-03-30 14:01:44
  from "C:\wamp\www\Plug_IT\smarty\templates\register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fbc028820083_43919864',
  'file_dependency' => 
  array (
    '4ca6053373b3f935f4687f6c0e32ce92f9142138' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\register.tpl',
      1 => 1459339256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fbc028820083_43919864 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2925856fbc0287ffe74_66984097',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'registerform'}  file:register.tpl */
function block_2604356fbc02880bdc9_10506920($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'registerform'} */
/* {block 'body'}  file:register.tpl */
function block_2925856fbc0287ffe74_66984097($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Registreren</h1>
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'registerform', array (
  0 => 'block_2604356fbc02880bdc9_10506920',
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
