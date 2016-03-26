<?php
/* Smarty version 3.1.29, created on 2016-03-26 15:28:21
  from "C:\wamp\www\Plug_IT\smarty\templates\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f69c855e5a76_89474208',
  'file_dependency' => 
  array (
    '2fb03d898abba0576ed44abeb7ac9f15ffa64f12' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\login.tpl',
      1 => 1458998301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f69c855e5a76_89474208 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_3193956f69c855dd9b4_73679927',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:login.tpl */
function block_3193956f69c855dd9b4_73679927($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Inloggen</h1>
        <form action="" onsubmit="return login(this, event, 'Home')" method="POST" enctype="multipart/form-data">
            <div class="line">
                <label>Gebruikersnaam:</label>
                <div class="input">
                    <div class="input">
                        <input type="text" name="username" required="true">
                    </div>
                </div>
                <label>Wachtwoord:</label>
                <div class="input">
                    <div class="input">
                        <input type="password" name="password" required="true">
                    </div>
                </div>
            </div>
            <button type="submit" value="Submit" class="form_button">Inloggen</button>
        </form>
    </div>
<?php
}
/* {/block 'body'} */
}
