<?php
/* Smarty version 3.1.29, created on 2016-03-26 00:09:46
  from "C:\wamp\www\Plug_IT\smarty\templates\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f5c53a26c690_99398327',
  'file_dependency' => 
  array (
    '2fb03d898abba0576ed44abeb7ac9f15ffa64f12' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\login.tpl',
      1 => 1458947290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f5c53a26c690_99398327 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2894656f5c53a25b492_34479864',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:login.tpl */
function block_2894656f5c53a25b492_34479864($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Inloggen</h1>
        <form action="<?php echo $_smarty_tpl->tpl_vars['controller']->value->loginUser();?>
" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="password" required="true">
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
