<?php
/* Smarty version 3.1.29, created on 2016-03-30 13:56:12
  from "C:\wamp\www\Plug_IT\smarty\templates\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fbbedc86c487_98439704',
  'file_dependency' => 
  array (
    '2fb03d898abba0576ed44abeb7ac9f15ffa64f12' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\login.tpl',
      1 => 1459338925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fbbedc86c487_98439704 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2128056fbbedc858326_15424047',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:login.tpl */
function block_2128056fbbedc858326_15424047($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Inloggen</h1>
        <form class="loginform" action="" onsubmit="return login(this, event, 'Home')" method="POST" enctype="multipart/form-data">
            <label>Gebruikersnaam:<input type="text" name="username" required="true"></label>
            <label>Wachtwoord:<input type="password" name="password" required="true"></label>
            <button type="submit" value="Submit" class="form_button">Inloggen</button>
        </form>

        <a href="/Plug_IT/index.php?page=Register">Heeft u nog geen account? Dan kunt u hier registreren.</a>
    </div>
<?php
}
/* {/block 'body'} */
}
