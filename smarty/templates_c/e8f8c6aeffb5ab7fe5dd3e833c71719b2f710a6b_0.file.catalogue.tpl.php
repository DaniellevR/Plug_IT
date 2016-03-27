<?php
/* Smarty version 3.1.29, created on 2016-03-27 06:44:59
  from "C:\xampp\htdocs\Plug_IT\smarty\templates\catalogue.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f7654b5af7d4_84584119',
  'file_dependency' => 
  array (
    'e8f8c6aeffb5ab7fe5dd3e833c71719b2f710a6b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\smarty\\templates\\catalogue.tpl',
      1 => 1459053895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f7654b5af7d4_84584119 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2144556f7654b587297_57073452',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:catalogue.tpl */
function block_2144556f7654b587297_57073452($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Catalogus</h1>

        <?php if (isset($_smarty_tpl->tpl_vars['childCategories']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['childCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cat_0_saved_item = isset($_smarty_tpl->tpl_vars['cat']) ? $_smarty_tpl->tpl_vars['cat'] : false;
$_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$__foreach_cat_0_saved_local_item = $_smarty_tpl->tpl_vars['cat'];
?>
                <a href="/Plug_IT/index.php?page=Catalogue&cat=<?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
">
                    <div class='categoryThumbnail'>
                        <img class='categoryImage' src='assets/pix/category/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
.jpg' alt='NO IMAGE' />
                        <?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
 
                    </div>
                </a>
            <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_0_saved_local_item;
}
if ($__foreach_cat_0_saved_item) {
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_0_saved_item;
}
?>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['allCategories']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['allCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cat_1_saved_item = isset($_smarty_tpl->tpl_vars['cat']) ? $_smarty_tpl->tpl_vars['cat'] : false;
$_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$__foreach_cat_1_saved_local_item = $_smarty_tpl->tpl_vars['cat'];
?>
                <?php if ($_smarty_tpl->tpl_vars['cat']->value->parent == null) {?>
                    <a href="/Plug_IT/index.php?page=Catalogue&cat=<?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
">
                        <div class='categoryThumbnail'>
                            <img class='categoryImage' src='assets/pix/category/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
.jpg' alt='NO IMAGE' />
                            <?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
 
                        </div>
                    </a>
                <?php }?>
            <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved_local_item;
}
if ($__foreach_cat_1_saved_item) {
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved_item;
}
?>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['products']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_product_2_saved_item = isset($_smarty_tpl->tpl_vars['product']) ? $_smarty_tpl->tpl_vars['product'] : false;
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$__foreach_product_2_saved_local_item = $_smarty_tpl->tpl_vars['product'];
?>
                <a href='/Plug_IT/index.php?page=Product&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
'>
                    <div class='productThumbnail'>
                        <img class='productImage' src='assets/pix/product/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
.jpg' alt='NO IMAGE' />
                        <div class='productName'>
                            <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h4>
                        </div>
                        <div class='shortDescription'>
                            <p><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</p></div>
                        <div id='productBuy'><p>€<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</p>
                        </div>
                    </div>
                </a>
            <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_2_saved_local_item;
}
if ($__foreach_product_2_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_2_saved_item;
}
?>
        <?php }?>
    </div>
<?php
}
/* {/block 'body'} */
}
