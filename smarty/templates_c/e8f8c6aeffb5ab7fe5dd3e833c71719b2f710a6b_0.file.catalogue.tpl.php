<?php
/* Smarty version 3.1.29, created on 2016-04-04 04:19:15
  from "C:\xampp\htdocs\Plug_IT\smarty\templates\catalogue.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5701cf230ad4a8_76428679',
  'file_dependency' => 
  array (
    'e8f8c6aeffb5ab7fe5dd3e833c71719b2f710a6b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\smarty\\templates\\catalogue.tpl',
      1 => 1459736296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5701cf230ad4a8_76428679 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_170275701cf23065086_30513275',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:catalogue.tpl */
function block_170275701cf23065086_30513275($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Catalogus</h1>

        <?php if (isset($_smarty_tpl->tpl_vars['productsFound']->value)) {?>
            <?php if (sizeof($_smarty_tpl->tpl_vars['productsFound']->value) > 0) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['productsFound']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_product_0_saved_item = isset($_smarty_tpl->tpl_vars['product']) ? $_smarty_tpl->tpl_vars['product'] : false;
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$__foreach_product_0_saved_local_item = $_smarty_tpl->tpl_vars['product'];
?>
                    <div class='productThumbnail'>
                        <div class='leftThumbnailPart'>                        
                            <img class='productImage' src='assets/pix/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
.png' alt='NO IMAGE' />
                        </div>
                        <div class='centerThumbnailPart'>

                            <div class='productName'>
                                <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h4>
                            </div>
                            <div class='shortDescription'>
                                <p><?php echo $_smarty_tpl->tpl_vars['product']->value->shortDescription;?>
</p></div>
                            <div id='productBuy'><p>€<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</p>
                            </div>
                        </div>
                        <div class='rightThumbnailPart'>
                            <div class="buy">
                                <form class="noadditionalDesign" action="/Plug_IT/index.php?page=Cart" method="post">
                                    <input class='cartAmount' name="amount" type="number" min="1" step="1" value="1" />
                                    <input name="page" value="Cart" hidden/>
                                    <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" hidden/>
                                    <input cass="CartButton" type="submit" value="Toevoegen aan winkelwagentje"/>
                                </form>
                            </div>
                            <a id='linkToProduct' href='/Plug_IT/index.php?page=Product&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
'>
                                <p>Naar productpagina</p>
                            </a>
                        </div>
                    </div>
                <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved_local_item;
}
if ($__foreach_product_0_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved_item;
}
?>
            <?php } else { ?>
                <h4>Geen producten gevonden</h4>
            <?php }?>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['childCategories']->value)) {?>
            <?php if (count($_smarty_tpl->tpl_vars['childCategories']->value) > 0) {?>
                <div class='catalogueHeader'><h3>Sub-Categoriën</h3></div>
                <?php
$_from = $_smarty_tpl->tpl_vars['childCategories']->value;
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
                    <a href="/Plug_IT/index.php?page=Catalogue&cat=<?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
">
                        <div class='categoryThumbnail'>
                            <img class='categoryImage' src='assets/pix/categories/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
.png' alt='NO IMAGE' />
                            <?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>

                        </div>
                    </a>
                <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved_local_item;
}
if ($__foreach_cat_1_saved_item) {
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved_item;
}
?>
            <?php }?>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['allCategories']->value)) {?>
            <?php if (count($_smarty_tpl->tpl_vars['allCategories']->value) > 0) {?>
                <div class='catalogueHeader'><h3>Categoriën</h3></div>
                <?php
$_from = $_smarty_tpl->tpl_vars['allCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cat_2_saved_item = isset($_smarty_tpl->tpl_vars['cat']) ? $_smarty_tpl->tpl_vars['cat'] : false;
$_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['cat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$__foreach_cat_2_saved_local_item = $_smarty_tpl->tpl_vars['cat'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['cat']->value->parent == null) {?>
                        <a href="/Plug_IT/index.php?page=Catalogue&cat=<?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
">
                            <div class='categoryThumbnail'>
                                <img class='categoryImage' src='assets/pix/categories/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
.png' alt='NO IMAGE' />
                                <?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
 
                            </div>
                        </a>

                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_2_saved_local_item;
}
if ($__foreach_cat_2_saved_item) {
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_2_saved_item;
}
?>
            <?php }?>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['products']->value)) {?>
            <?php if (count($_smarty_tpl->tpl_vars['products']->value) > 0) {?>
                <div class='catalogueHeader'><h3>Producten</h3></div>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_product_3_saved_item = isset($_smarty_tpl->tpl_vars['product']) ? $_smarty_tpl->tpl_vars['product'] : false;
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$__foreach_product_3_saved_local_item = $_smarty_tpl->tpl_vars['product'];
?>
                    <div class='productThumbnail'>
                        <div class='leftThumbnailPart'>                        
                            <img class='productImage' src='assets/pix/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
.png' alt='NO IMAGE' />
                        </div>
                        <div class='centerThumbnailPart'>

                            <div class='productName'>
                                <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h4>
                            </div>
                            <div class='shortDescription'>
                                <p><?php echo $_smarty_tpl->tpl_vars['product']->value->shortDescription;?>
</p></div>
                            <div id='productBuy'><p>€<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</p>
                            </div>
                        </div>
                        <div class='rightThumbnailPart'>
                            <div class="buy">
                                <form class="noadditionalDesign" action="/Plug_IT/index.php?page=Cart" method="post">
                                    <input class='cartAmount' name="amount" type="number" min="1" step="1" value="1" />
                                    <input name="page" value="Cart" hidden/>
                                    <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" hidden/>
                                    <input class="CartButton" type="submit" value="Toevoegen aan winkelwagentje"/>
                                </form>
                            </div>
                            <a id='linkToProduct' href='/Plug_IT/index.php?page=Product&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
'>
                                <p>Naar productpagina</p>
                            </a>
                        </div>
                    </div>
                <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_3_saved_local_item;
}
if ($__foreach_product_3_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_3_saved_item;
}
?>
            <?php }?>
        <?php }?>
    </div>
<?php
}
/* {/block 'body'} */
}
