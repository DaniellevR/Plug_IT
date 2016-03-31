<?php
/* Smarty version 3.1.29, created on 2016-03-31 17:12:08
  from "C:\wamp\www\Plug_IT\smarty\templates\usersforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd3e4836c8b0_84830969',
  'file_dependency' => 
  array (
    '318e80216c9bc2196cb058a2a72b0656aadbff9c' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\usersforms.tpl',
      1 => 1459433262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
    'file:registerform.tpl' => 1,
  ),
),false)) {
function content_56fd3e4836c8b0_84830969 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'usersforms', array (
  0 => 'block_852756fd3e48338774_84188935',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'parent_block'}  file:usersforms.tpl */
function block_2889256fd3e483406a5_52410015($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:registerform.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'parent_block'} */
/* {block 'usersforms'}  file:usersforms.tpl */
function block_852756fd3e48338774_84188935($_smarty_tpl, $_blockParentStack) {
?>


<div class="adminpart">
    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "parent_block", array (
  0 => 'block_2889256fd3e483406a5_52410015',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>

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
            </div>
            <div id="contentDivEditUser"></div>
            <button type="submit" value="Submit" class="form_button">Wijzigen</button>
        </form>
    </div>
<?php
}
/* {/block 'usersforms'} */
}
