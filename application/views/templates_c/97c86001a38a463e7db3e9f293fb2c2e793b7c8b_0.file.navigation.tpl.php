<?php
/* Smarty version 3.1.29, created on 2016-03-23 01:34:19
  from "C:\wamp\www\Plug_IT\Application\views\templates\navigation.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f1e48b2d2454_60677752',
  'file_dependency' => 
  array (
    '97c86001a38a463e7db3e9f293fb2c2e793b7c8b' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\Application\\views\\templates\\navigation.tpl',
      1 => 1458693167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f1e48b2d2454_60677752 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'System/libraries/smarty/plugins\\modifier.replace.php';
echo '<script'; ?>
 type="text/javascript" src=<?php echo base_url();?>
assets/js/navigation".js"><?php echo '</script'; ?>
>
<div class="content_container">
    <div class="navigation">
        <ul class="nav">
            <a href=<?php echo $_smarty_tpl->tpl_vars['catalogue']->value;?>
>Catalogus</a>
            <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_0_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_0_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                <a href=<?php echo $_smarty_tpl->tpl_vars['categorypage']->value;?>
?category=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['parent']->value->name,' ','+');?>
><li><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</li></a>
                <ul>
                    <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_1_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_1_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['child']->value->parent == $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                            <a href=<?php echo $_smarty_tpl->tpl_vars['productpage']->value;?>
?category=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['parent']->value->name,' ','+');?>
&subcategory=<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['child']->value->name,' ','+');?>
><li><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</li></a>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_1_saved_local_item;
}
if ($__foreach_child_1_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_1_saved_item;
}
?>
                </ul>
            <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_local_item;
}
if ($__foreach_parent_0_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_item;
}
?>
        </ul>
    </div><?php }
}
