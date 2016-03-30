<?php
/* Smarty version 3.1.29, created on 2016-03-30 14:44:25
  from "C:\wamp\www\Plug_IT\smarty\templates\usersforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fbca29573e71_10486597',
  'file_dependency' => 
  array (
    '318e80216c9bc2196cb058a2a72b0656aadbff9c' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\usersforms.tpl',
      1 => 1459341844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
  ),
),false)) {
function content_56fbca29573e71_10486597 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'usersforms', array (
  0 => 'block_1154956fbca29535b68_02269480',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'usersforms'}  file:usersforms.tpl */
function block_1154956fbca29535b68_02269480($_smarty_tpl, $_blockParentStack) {
?>


<div class="adminpart">
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

        <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
            <h3>Gebruiker wijzigen</h3>
            <div class="line">
                <label>Gebruikersnaam:</label>
                <div class="input">
                    <select id="users_edit" name="users_edit" onchange="grabInfo(this, 'editUser', 'contentDivEditUser')">
                        <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_1_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_1_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
                            <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_1_saved_local_item;
}
if ($__foreach_user_1_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_1_saved_item;
}
?>
                    </select>
                </div>
            </div>
            <div id="contentDivEditUser"></div>
            <button type="submit" value="Submit" class="form_button">Wijzigen</button>
        </form>
    </div>
<?php
}
/* {/block 'usersforms'} */
}
