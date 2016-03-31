<?php
/* Smarty version 3.1.29, created on 2016-03-31 17:12:08
  from "C:\wamp\www\Plug_IT\smarty\templates\registerform.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd3e483aab19_66104883',
  'file_dependency' => 
  array (
    '6714e716b7dcca004e06191758fec46d071d1ce6' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\registerform.tpl',
      1 => 1459433328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fd3e483aab19_66104883 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'registerform', array (
  0 => 'block_1452256fd3e48390e61_37601183',
  1 => false,
  3 => 0,
  2 => 0,
));
}
/* {block 'registerform'}  file:registerform.tpl */
function block_1452256fd3e48390e61_37601183($_smarty_tpl, $_blockParentStack) {
?>

    <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
        <h3>Gebruiker toevoegen</h3>
        <h5>Persoonsgegevens</h5>
        <label>Naam:</label>
        <input type="text" name="firstname" required="true" placeholder="Voornaam">
        <input type="text" name="prefix" required="true" placeholder="tv">
        <input type="text" name="lastname" required="true" placeholder="Achternaam">
        <label>Email:</label>
        <input type="text" name="email" required="true">
        <label>Telefoonnummer:</label>
        <input type="text" name="telephonenumber" required="true">
        <h5>Adresgegevens</h5>
        <label>Adres:</label>
        <input type="text" name="streetnameAddUser" required="true" placeholder="Straatnaam">
        <input type="text" name="housenumberAddUser" required="true" placeholder="nr">
        <input type="text" name="housenumberSuffixAddUser" placeholder="tv">
        <label>Postcode:</label>
        <input type="text" name="postalCodeAddUser" required="true">
        <label>Woonplaats:</label>
        <input type="text" name="cityAddUser" required="true">
        <h5>Accountgegevens</h5>
        <label>Gebruikersnaam:</label><input type="text" name="username" required="true">
        <label>Rol:</label>
        <select name="roles">
            <?php
$_from = $_smarty_tpl->tpl_vars['roles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_role_0_saved_item = isset($_smarty_tpl->tpl_vars['role']) ? $_smarty_tpl->tpl_vars['role'] : false;
$_smarty_tpl->tpl_vars['role'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['role']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
$__foreach_role_0_saved_local_item = $_smarty_tpl->tpl_vars['role'];
?>
                <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['role']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['role']->value->name;?>
</option>
            <?php
$_smarty_tpl->tpl_vars['role'] = $__foreach_role_0_saved_local_item;
}
if ($__foreach_role_0_saved_item) {
$_smarty_tpl->tpl_vars['role'] = $__foreach_role_0_saved_item;
}
?>
        </select>
        <label>Wachtwoord:</label><input type="password" name="password" required="true">
        <label>Herhaal wachtwoord:</label><input type="password" name="repeat_password" required="true">
        <button type="submit" value="Submit" class="form_button">Toevoegen</button>
    </form>
<?php
}
/* {/block 'registerform'} */
}
