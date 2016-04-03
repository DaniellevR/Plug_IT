<?php
/* Smarty version 3.1.29, created on 2016-04-03 02:03:56
  from "C:\wamp\www\Plug_IT\smarty\templates\accountInfoForm.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57005decc66189_52207229',
  'file_dependency' => 
  array (
    '06c7345b2bf3412fe9afc9266efe68ecb6399e6c' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\accountInfoForm.tpl',
      1 => 1459637491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57005decc66189_52207229 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'accountInfoForm', array (
  0 => 'block_1250257005decb5a455_85587143',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php }
/* {block 'accountInfoForm'}  file:accountInfoForm.tpl */
function block_1250257005decb5a455_85587143($_smarty_tpl, $_blockParentStack) {
?>

    <form method="POST" enctype="multipart/form-data" onsubmit="editUser(this, event)">

        <?php if ($_smarty_tpl->tpl_vars['errors']->value !== '') {?>
            <div class="errortext">
                <?php echo $_smarty_tpl->tpl_vars['errors']->value;?>

            </div>
        <?php }?>

        <?php $_smarty_tpl->tpl_vars['username'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'username', 0);?>
        <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'user', 0);?>

        <?php if (isset($_GET['page']) && $_GET['page'] !== "MyAccount") {?>
            <div>
                <h3>Gebruiker wijzigen</h3>            
            </div>
            <div>
                <label for="users_edit">Gebruikersnaam</label>
                <select type="text" id="users_edit" name="users_edit" onchange="grabInfo(this, 'editUser', 'contentDivEditUser')">
                    <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_useritem_0_saved_item = isset($_smarty_tpl->tpl_vars['useritem']) ? $_smarty_tpl->tpl_vars['useritem'] : false;
$_smarty_tpl->tpl_vars['useritem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['useritem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['useritem']->value) {
$_smarty_tpl->tpl_vars['useritem']->_loop = true;
$__foreach_useritem_0_saved_local_item = $_smarty_tpl->tpl_vars['useritem'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['username']->value === '') {?>
                            <?php $_smarty_tpl->tpl_vars['username'] = new Smarty_Variable($_smarty_tpl->tpl_vars['useritem']->value->username, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'username', 0);?>
                            <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable($_smarty_tpl->tpl_vars['useritem']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'user', 0);?>
                        <?php }?>
                        <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
" id="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
"><?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['useritem'] = $__foreach_useritem_0_saved_local_item;
}
if ($__foreach_useritem_0_saved_item) {
$_smarty_tpl->tpl_vars['useritem'] = $__foreach_useritem_0_saved_item;
}
?>
                </select>
            </div>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars['username'] = new Smarty_Variable($_SESSION['username'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'username', 0);?>
            <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_useritem_1_saved_item = isset($_smarty_tpl->tpl_vars['useritem']) ? $_smarty_tpl->tpl_vars['useritem'] : false;
$_smarty_tpl->tpl_vars['useritem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['useritem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['useritem']->value) {
$_smarty_tpl->tpl_vars['useritem']->_loop = true;
$__foreach_useritem_1_saved_local_item = $_smarty_tpl->tpl_vars['useritem'];
?>
                <?php if ($_smarty_tpl->tpl_vars['username']->value === $_smarty_tpl->tpl_vars['useritem']->value->username) {?>
                    <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable($_smarty_tpl->tpl_vars['useritem']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'user', 0);?>
                <?php }?>
            <?php
$_smarty_tpl->tpl_vars['useritem'] = $__foreach_useritem_1_saved_local_item;
}
if ($__foreach_useritem_1_saved_item) {
$_smarty_tpl->tpl_vars['useritem'] = $__foreach_useritem_1_saved_item;
}
?>
        <?php }?>

        <div id="contentDivEditUser">
            <div><h5>Persoonsgegevens</h5></div>
            <div><label for="firstname">Name</label><input type="text" id="firstname" name="firstnameEditUser" required="true" placeholder="Voornaam" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->firstname;?>
"></div>
            <div><label></label><input type="text" id="prefix" name="prefixEditUser" placeholder="Tussenvoegsel" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->prefix;?>
"></div>
            <div><label></label><input type="text" id="lastname" name="lastnameEditUser" required="true" placeholder="Achternaam" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->lastname;?>
"></div>
            <div><label for="email">Email</label><input type="email" name="emailEditUser" id="email"  required="true" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
"/></div>
            <div><label for="telephonenumber">Telefoonnummer</label><input type="text" id="telephonenumber" name="telephonenumberEditUser" required="true" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->telephonenumber;?>
"></div>

            <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_useritem_2_saved_item = isset($_smarty_tpl->tpl_vars['useritem']) ? $_smarty_tpl->tpl_vars['useritem'] : false;
$_smarty_tpl->tpl_vars['useritem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['useritem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['useritem']->value) {
$_smarty_tpl->tpl_vars['useritem']->_loop = true;
$__foreach_useritem_2_saved_local_item = $_smarty_tpl->tpl_vars['useritem'];
?>
                <?php if ($_smarty_tpl->tpl_vars['useritem']->value->username === $_smarty_tpl->tpl_vars['username']->value) {?>
                    <div><h5>Adresgegevens</h5></div>
                    <div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameEditUser" required="true" placeholder="Straatnaam" value="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->streetname;?>
"></div>
                    <div><label></label><input type="text" name="housenumberEditUser" required="true" placeholder="Huisnummer" value="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->housenumber;?>
"></div>
                    <div><label></label><input type="text" name="housenumberSuffixEditUser" placeholder="Huisnummertoevoeging" value="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->housenumber_suffix;?>
"></div>
                    <div><label for="postalCode">Postcode</label><input type="text" name="postalCodeEditUser" required="true" value="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->postalCode;?>
"></div>
                    <div><label for="city">Woonplaats</label><input type="text" name="cityEditUser" required="true" value="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->city;?>
"></div>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars['useritem'] = $__foreach_useritem_2_saved_local_item;
}
if ($__foreach_useritem_2_saved_item) {
$_smarty_tpl->tpl_vars['useritem'] = $__foreach_useritem_2_saved_item;
}
?>

            <div><h5>Accountgegevens</h5></div>

            <?php if (isset($_GET['page']) && $_GET['page'] === "MyAccount") {?>
                <input type="text" name="rolesEditUser" value="User" required="true" hidden="true">
            <?php } else { ?>
                <label>Rol</label><select type="text" name="rolesEditUser">
                    <?php
$_from = $_smarty_tpl->tpl_vars['roles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_role_3_saved_item = isset($_smarty_tpl->tpl_vars['role']) ? $_smarty_tpl->tpl_vars['role'] : false;
$_smarty_tpl->tpl_vars['role'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['role']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->_loop = true;
$__foreach_role_3_saved_local_item = $_smarty_tpl->tpl_vars['role'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->rolename === $_smarty_tpl->tpl_vars['role']->value) {?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value->name;?>
" selected><?php echo $_smarty_tpl->tpl_vars['role']->value->name;?>
</option>
                        <?php } else { ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['role']->value->name;?>
</option>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['role'] = $__foreach_role_3_saved_local_item;
}
if ($__foreach_role_3_saved_item) {
$_smarty_tpl->tpl_vars['role'] = $__foreach_role_3_saved_item;
}
?>
                </select>
            <?php }?>

            <div><label for="usernameEditUser">Gebruikersnaam</label><input type="text" id="usernameEditUser" name="usernameEditUser" readonly value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"></div>
            <div><label for="passwordEditUser">Huidige wachtwoord</label><input type="password" id="passwordEditUser" name="passwordEditUser"></div>
            <div><label for="newPasswordEditUser">Nieuwe wachtwoord</label><input type="password" id="newPasswordEditUser" name="newPasswordEditUser"></div>
            <div><label for="repeat_passwordEditUser">Herhaal wachtwoord</label><input type="password" id="repeat_passwordEditUser" name="repeat_passwordEditUser"></div>
        </div>
        <div>
            <label></label>
            <button type="submit" value="Submit" class="button">Wijzigen</button>
        </div>
    </form>

    
<?php
}
/* {/block 'accountInfoForm'} */
}
