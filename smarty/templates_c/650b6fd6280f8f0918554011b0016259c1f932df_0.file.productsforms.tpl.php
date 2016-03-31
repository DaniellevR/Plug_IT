<?php
/* Smarty version 3.1.29, created on 2016-03-31 13:36:46
  from "C:\wamp\www\Plug_IT\smarty\templates\productsforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd0bce1f6c76_27199122',
  'file_dependency' => 
  array (
    '650b6fd6280f8f0918554011b0016259c1f932df' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\productsforms.tpl',
      1 => 1459424061,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
  ),
),false)) {
function content_56fd0bce1f6c76_27199122 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'productsforms', array (
  0 => 'block_147156fd0bcde95a18_99453701',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'productsforms'}  file:productsforms.tpl */
function block_147156fd0bcde95a18_99453701($_smarty_tpl, $_blockParentStack) {
?>

    <div class="adminpart">
        <form action="handlers/UploadProductHandler.php" method="POST" enctype="multipart/form-data">
            <h3>Product toevoegen</h3>
            <h5>Productinformatie</h5>
            <label>Productnaam:</label>
            <input type="text" name="productname" required="true">
            <label>Korte omschrijving:</label>
            <textarea name="productSummaryShort"  maxlength="200" required="true"></textarea>
            <label>Lange omschrijving:</label>
            <textarea name="productSummaryLong" class="longdescription" required="true"></textarea>
            <label>Kenmerken:</label>
            <input type="text" name="characteristics" required="true" placeholder="Kenmerk, Kenmerk, Kenmerk">
            <label>Prijs:</label>
            <input type="number" name="price" min="0.01" step="0.01" value="0.01" />
            <label>Merk:</label>
            <input type="text" name="brand" required="true">
            <label>Aantal op voorraad:</label>
            <input type="number" name="amount" required="true">
            <label>Categorienaam:</label>
            <select id="categoriesAddProduct" name="categoriesAddProduct">
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
                    <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
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
                        <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                            <option class="subcategory" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_1_saved_local_item;
}
if ($__foreach_child_1_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_1_saved_item;
}
?>
                <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_local_item;
}
if ($__foreach_parent_0_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_item;
}
?>
            </select>
            <label>Foto product:</label>
            <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>

            <h5>Leverancier</h5>
            <label>Kies uw leverancier:</label>
            <select name="suppliersAddProduct" onchange="grabInfo(this, 'getSupplierInfo', 'contentDivAddProduct')">
                <option value="">Nieuwe leverancier</option>
                <?php
$_from = $_smarty_tpl->tpl_vars['suppliers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_supplier_2_saved_item = isset($_smarty_tpl->tpl_vars['supplier']) ? $_smarty_tpl->tpl_vars['supplier'] : false;
$_smarty_tpl->tpl_vars['supplier'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['supplier']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['supplier']->value) {
$_smarty_tpl->tpl_vars['supplier']->_loop = true;
$__foreach_supplier_2_saved_local_item = $_smarty_tpl->tpl_vars['supplier'];
?>
                    <option id="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->name;?>
" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['supplier']->value->name;?>
</option>
                <?php
$_smarty_tpl->tpl_vars['supplier'] = $__foreach_supplier_2_saved_local_item;
}
if ($__foreach_supplier_2_saved_item) {
$_smarty_tpl->tpl_vars['supplier'] = $__foreach_supplier_2_saved_item;
}
?>
            </select>

            <div id="contentDivAddProduct">
                <label>Naam:</label>
                <input type="text" name="suppliername" required="true">
                <label>Email:</label>
                <input type="email" name="email" required="true">
                <label>Telefoonnummer:</label>
                <input type="tel" name="telephonenumber" required="true">
                <label>Adres:</label>
                <input type="text" name="streetname" required="true" placeholder="Straatnaam">
                <input class="small_field" type="text" name="housenumber" required="true" placeholder="nr">
                <input class="small_field" type="text" name="housenumberSuffix" placeholder="tv">
                <label>Postcode:</label>
                <input type="text" name="postalCode" required="true">
                <label>Woonplaats:</label>
                <input type="text" name="city" required="true">
            </div>

            <button type="submit" value="Submit" class="form_button">Toevoegen</button>
        </form>

        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Product wijzigen</h3>
            <label>Categorienaam:</label>
            <select id="categories_remove" name="categoriesAddProduct" onchange="grabInfo(this, 'getProductsFromCategoryEditProduct', 'contentDivEditProductPart1')">
                <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_3_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_3_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                    <option class="category" id="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                    <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_4_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_4_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                            <option class="subcategory" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_4_saved_local_item;
}
if ($__foreach_child_4_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_4_saved_item;
}
?>
                <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_3_saved_local_item;
}
if ($__foreach_parent_3_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_3_saved_item;
}
?>
            </select>
            <div id="contentDivEditProductPart1"></div>
            <div id="contentDivEditProductPart2"></div>
            <button type="submit" value="Submit" class="form_button">Wijzigen</button>
        </form>

        <form method="POST" enctype="multipart/form-data" onsubmit="">
            <h3>Product verwijderen</h3>
            <label>Categorie:</label>
            <select id="categories_remove" name="categoriesAddProduct" onchange="grabInfo(this, 'getProductsFromCategoryRemoveProduct', 'contentDivRemoveProduct')">
                <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_5_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_5_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                    <option class="category" id="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                    <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_6_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_6_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                            <option class="subcategory" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_6_saved_local_item;
}
if ($__foreach_child_6_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_6_saved_item;
}
?>
                <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_5_saved_local_item;
}
if ($__foreach_parent_5_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_5_saved_item;
}
?>
            </select>
            <div id="contentDivRemoveProduct"></div>
            <button type="submit" value="Submit" class="form_button">Verwijderen</button>
        </form>
    </div>
<?php
}
/* {/block 'productsforms'} */
}
