<?php
/* Smarty version 3.1.29, created on 2016-03-24 16:25:58
  from "C:\wamp\www\Plug_IT\smarty\templates\layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f40706a7ed95_57358766',
  'file_dependency' => 
  array (
    'bb0308ddaa30b162f7ec483cf35c26cc0e7708d3' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\layout.tpl',
      1 => 1458833130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f40706a7ed95_57358766 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>

<html>
<head>
  <title><?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_1394756f40706a4cb70_44569889',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
</title>
  <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'head', array (
  0 => 'block_2370456f40706a54058_33991409',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

</head>
<body>

    <h2>My webshoppie</h2>
    
    <ul>
    <?php
$_from = $_smarty_tpl->tpl_vars['header']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_nav_0_saved_item = isset($_smarty_tpl->tpl_vars['nav']) ? $_smarty_tpl->tpl_vars['nav'] : false;
$_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['nav']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['nav']->value) {
$_smarty_tpl->tpl_vars['nav']->_loop = true;
$__foreach_nav_0_saved_local_item = $_smarty_tpl->tpl_vars['nav'];
?>
        <li><a href="/Plug_IT/index.php?method=<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['nav']->value;?>
</a></li>
    <?php
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_0_saved_local_item;
}
if ($__foreach_nav_0_saved_item) {
$_smarty_tpl->tpl_vars['nav'] = $__foreach_nav_0_saved_item;
}
?>
    </ul>

    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2788956f40706a6f6f4_12640689',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

        
   <ul>
   <?php
$_from = $_smarty_tpl->tpl_vars['footer']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_info_1_saved_item = isset($_smarty_tpl->tpl_vars['info']) ? $_smarty_tpl->tpl_vars['info'] : false;
$_smarty_tpl->tpl_vars['info'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['info']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
$__foreach_info_1_saved_local_item = $_smarty_tpl->tpl_vars['info'];
?>
        <li><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</li>
    <?php
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_1_saved_local_item;
}
if ($__foreach_info_1_saved_item) {
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_1_saved_item;
}
?>
    </ul>
</body>
</html>
<?php }
/* {block 'title'}  file:layout.tpl */
function block_1394756f40706a4cb70_44569889($_smarty_tpl, $_blockParentStack) {
?>
Default Page Title<?php
}
/* {/block 'title'} */
/* {block 'head'}  file:layout.tpl */
function block_2370456f40706a54058_33991409($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'head'} */
/* {block 'body'}  file:layout.tpl */
function block_2788956f40706a6f6f4_12640689($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'body'} */
}
