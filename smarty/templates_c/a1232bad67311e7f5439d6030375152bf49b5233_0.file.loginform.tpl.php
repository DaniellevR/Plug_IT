<?php
/* Smarty version 3.1.29, created on 2016-03-30 16:21:42
  from "C:\wamp\www\Plug_IT\smarty\templates\loginform.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fbe0f636dd42_20514563',
  'file_dependency' => 
  array (
    'a1232bad67311e7f5439d6030375152bf49b5233' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\loginform.tpl',
      1 => 1459347562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fbe0f636dd42_20514563 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'loginform', array (
  0 => 'block_3104956fbe0f63653f4_79353856',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php }
/* {block 'loginform'}  file:loginform.tpl */
function block_3104956fbe0f63653f4_79353856($_smarty_tpl, $_blockParentStack) {
?>

    <form class="loginform" onsubmit="login(this, event);" method="POST" enctype="multipart/form-data">
        <label>Gebruikersnaam:<input type="text" name="username" required="true"></label>
        <label>Wachtwoord:<input type="password" name="password" required="true"></label>
        <button type="submit" value="Submit" class="form_button">Inloggen</button>
    </form>

    <a href="/Plug_IT/index.php?page=Register">Heeft u nog geen account? Dan kunt u hier registreren.</a>
<?php
}
/* {/block 'loginform'} */
}