<?php
/* Smarty version 3.1.29, created on 2016-04-03 20:11:38
  from "C:\xampp\htdocs\Plug_IT\smarty\templates\registerform.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57015cda2552e2_13438728',
  'file_dependency' => 
  array (
    'f9330520542084b4a58936b82d438a6a7e19dadb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\smarty\\templates\\registerform.tpl',
      1 => 1459600610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57015cda2552e2_13438728 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'registerform', array (
  0 => 'block_1484057015cda21a226_71627578',
  1 => false,
  3 => 0,
  2 => 0,
));
}
/* {block 'registerform'}  file:registerform.tpl */
function block_1484057015cda21a226_71627578($_smarty_tpl, $_blockParentStack) {
?>

    <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event);">

        <?php if ($_smarty_tpl->tpl_vars['errors']->value !== '') {?>
            <div class="errortext">
                <?php echo $_smarty_tpl->tpl_vars['errors']->value;?>

            </div>
        <?php }?>
        
        <input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
        
        <div>
            <?php if (isset($_GET['page']) && $_GET['page'] !== "Register") {?>
                <h3>Gebruiker toevoegen</h3>
            <?php }?>
            <h5>Persoonsgegevens</h5>
        </div>
        <div>
            <label for="firstname">Name</label>
            <input type="text" id="firstname" name="firstname" required="true" placeholder="Voornaam">
        </div>
        <div>
            <label></label>
            <input type="text" id="prefix" name="prefix" required="true" placeholder="Tussenvoegsel">
        </div>
        <div>
            <label></label>
            <input type="text" id="lastname" name="lastname" required="true" placeholder="Achternaam">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email"  required="true"/>
        </div>
        <div>
            <label for="telephonenumber">Telefoonnummer</label>
            <input type="text" id="telephonenumber" name="telephonenumber" required="true">
        </div>

        <div><h5>Adresgegevens</h5></div>
        <div>
            <label for="streetname">Adres</label>
            <input type="text" id="streetname" name="streetnameAddUser" required="true" placeholder="Straatnaam">
        </div>
        <div>
            <label></label>
            <input type="text" name="housenumberAddUser" required="true" placeholder="Huisnummer">
        </div>
        <div>
            <label></label>
            <input type="text" name="housenumberSuffixAddUser" placeholder="Huisnummertoevoeging">
        </div>
        <div>
            <label for="postalCode">Postcode</label>
            <input type="text" name="postalCodeAddUser" required="true">
        </div>
        <div>
            <label for="city">Woonplaats</label>
            <input type="text" name="cityAddUser" required="true">
        </div>
        <div><h5>Accountgegevens</h5></div>

        <?php if (isset($_COOKIE['PHPSESSID']) && isset($_SESSION['usertype'])) {?>
            <?php if ($_SESSION['usertype'] === "Administrator") {?>
                <div>
                    <label for="roles">Rol</label>
                    <select type="text" id="roles" name="roles">
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
                </div>
            <?php } else { ?>
                <div>
                    <input type="text" name="roles" value="User" required="true" hidden="true">
                </div>
            <?php }?>
        <?php } else { ?>
            <input type="text" name="roles" value="User" required="true" hidden="true">
        <?php }?>

        <div>
            <label for="username">Gebruikersnaam</label>
            <input type="text" id="username" name="username" required="true">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required="true">
        </div>
        <div>
            <label for="repeat_password">Password Again</label>
            <input type="password" id="repeat_password" name="repeat_password" required="true">
        </div>
        <div>
            <label></label>
            <button type="submit" value="Registreren" class="button">Registreren</button>
        </div>
    </form>
<?php
}
/* {/block 'registerform'} */
}
