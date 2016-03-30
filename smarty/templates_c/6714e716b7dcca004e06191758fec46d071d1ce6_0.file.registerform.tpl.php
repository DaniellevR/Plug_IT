<?php
/* Smarty version 3.1.29, created on 2016-03-30 14:01:44
  from "C:\wamp\www\Plug_IT\smarty\templates\registerform.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fbc0287b4be1_98067367',
  'file_dependency' => 
  array (
    '6714e716b7dcca004e06191758fec46d071d1ce6' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\registerform.tpl',
      1 => 1459339278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:register.tpl' => 1,
  ),
),false)) {
function content_56fbc0287b4be1_98067367 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'registerform', array (
  0 => 'block_305256fbc0287a4296_46248468',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:register.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'registerform'}  file:registerform.tpl */
function block_305256fbc0287a4296_46248468($_smarty_tpl, $_blockParentStack) {
?>

    <form class="loginform" onsubmit="" method="POST" enctype="multipart/form-data">
        <label>Gebruikersnaam:<input type="text" name="username" required="true"></label>
        <label>Wachtwoord:<input type="password" name="password" required="true"></label>
        <button type="submit" value="Submit" class="form_button">Inloggen</button>
    </form>
<?php
}
/* {/block 'registerform'} */
}
