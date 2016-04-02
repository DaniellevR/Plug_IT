<?php
/* Smarty version 3.1.29, created on 2016-04-02 14:00:15
  from "C:\wamp\www\Plug_IT\smarty\templates\accountInfoForm.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ffb44fddc516_47978039',
  'file_dependency' => 
  array (
    '06c7345b2bf3412fe9afc9266efe68ecb6399e6c' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\accountInfoForm.tpl',
      1 => 1459550809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ffb44fddc516_47978039 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'accountInfoForm', array (
  0 => 'block_745156ffb44fdb4970_69426549',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php }
/* {block 'accountInfoForm'}  file:accountInfoForm.tpl */
function block_745156ffb44fdb4970_69426549($_smarty_tpl, $_blockParentStack) {
?>

    <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
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
$__foreach_user_0_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_0_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
                    <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</option>
                <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_local_item;
}
if ($__foreach_user_0_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_item;
}
?>
            </select>
        </div>
        <div id="contentDivEditUser"></div>
        <div>
            <label></label>
            <button type="submit" value="Submit" class="button">Wijzigen</button>
        </div>
    </form>

    
<?php
}
/* {/block 'accountInfoForm'} */
}
