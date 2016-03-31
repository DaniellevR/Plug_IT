<?php
/* Smarty version 3.1.29, created on 2016-03-30 14:44:27
  from "C:\wamp\www\Plug_IT\smarty\templates\ordersforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fbca2b0dc423_59073204',
  'file_dependency' => 
  array (
    '5bfd3c34cf5030188f42fb17f33cc5f4e11feba4' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\ordersforms.tpl',
      1 => 1459341851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
  ),
),false)) {
function content_56fbca2b0dc423_59073204 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'ordersforms', array (
  0 => 'block_240356fbca2b0d37e6_96694666',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'ordersforms'}  file:ordersforms.tpl */
function block_240356fbca2b0d37e6_96694666($_smarty_tpl, $_blockParentStack) {
?>


<div class="adminpart">
        <form>
            <h3>Order toevoegen</h3>
            <div class="line">
                <label>Ordernaam:</label>
                <div class="input">
                    <input type="text" name="username" required="true">
                </div>
            </div>
            <div class="line">
                <label>Type:</label>
                <div class="input">
                    <select name="types">
                        <option value="User">Gebruiker</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="line">
                <label>Wachtwoord:</label>
                <div class="input">
                    <input type="password" name="password" required="true">
                </div>
            </div>
            <div class="line">
                <label>Herhaal wachtwoord:</label>
                <div class="input">
                    <input type="password" name="repeat_password" required="true">
                </div>
            </div>
            <button type="submit" value="Submit" class="form_button">Toevoegen</button>
        </form>
    </div>
<?php
}
/* {/block 'ordersforms'} */
}
