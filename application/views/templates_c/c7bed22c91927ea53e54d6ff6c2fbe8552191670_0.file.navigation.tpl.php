<?php
/* Smarty version 3.1.29, created on 2016-03-20 03:22:35
  from "C:\xampp\htdocs\Plug_IT\Application\views\templates\navigation.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ee096b4ec5c9_74014464',
  'file_dependency' => 
  array (
    'c7bed22c91927ea53e54d6ff6c2fbe8552191670' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\Application\\views\\templates\\navigation.tpl',
      1 => 1458434963,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ee096b4ec5c9_74014464 ($_smarty_tpl) {
?>
<div class="side_content">
    <ul class="nav">
        <li><a href='catalogue.php'>Catalogus</a></li>       
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
                
            <li><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</li>
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
                        <li><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</li>
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
