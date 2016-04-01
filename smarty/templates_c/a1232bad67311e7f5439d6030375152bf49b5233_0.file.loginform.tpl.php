<?php
/* Smarty version 3.1.29, created on 2016-04-01 20:52:32
  from "C:\wamp\www\Plug_IT\smarty\templates\loginform.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fec370964f31_30182016',
  'file_dependency' => 
  array (
    'a1232bad67311e7f5439d6030375152bf49b5233' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\loginform.tpl',
      1 => 1459536749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fec370964f31_30182016 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'loginform', array (
  0 => 'block_1633056fec370949e93_54531355',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php }
/* {block 'loginform'}  file:loginform.tpl */
function block_1633056fec370949e93_54531355($_smarty_tpl, $_blockParentStack) {
?>

    <form class="loginform" onsubmit="login(this, event);" method="POST" enctype="multipart/form-data">
        
        <?php if ($_smarty_tpl->tpl_vars['errors']->value !== '') {?>
            <div class="errortext">
                <?php echo $_smarty_tpl->tpl_vars['errors']->value;?>

            </div>
        <?php }?>
        
        <div>
            <label for="usernameLogin_remove">Gebruikersnaam</label>
            <input type="text" id="usernameLogin" name="username" required="true"/>
        </div>
        <div>
            <label for="passwordLogin">Wachtwoord</label>
            <input type="password" id="passwordLogin" name="password" required="true"/>
        </div>
        <div>
            <label></label>
            <button type="submit" value="Submit" class="button">Inloggen</button>
        </div>
    </form>
    <a href="/Plug_IT/index.php?page=Register">Heeft u nog geen account? Dan kunt u hier registreren.</a>
<?php
}
/* {/block 'loginform'} */
}
