<?php
/* Smarty version 3.1.29, created on 2016-04-03 13:15:18
  from "C:\wamp\www\Plug_IT\smarty\templates\productsforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5700fb463fc579_66578506',
  'file_dependency' => 
  array (
    '650b6fd6280f8f0918554011b0016259c1f932df' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\productsforms.tpl',
      1 => 1459682113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
  ),
),false)) {
function content_5700fb463fc579_66578506 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'productsforms', array (
  0 => 'block_229625700fb461f0649_24511762',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'productsforms'}  file:productsforms.tpl */
function block_229625700fb461f0649_24511762($_smarty_tpl, $_blockParentStack) {
?>

    <div class="adminpart">
        <form action="handlers/UploadProductHandler.php" method="POST" enctype="multipart/form-data">
            <div>
                <h3>Product toevoegen</h3>
                <h4>Productinformatie</h4>
            </div>            
            <div>
                <label for="productname">Productnaam</label>
                <input type="text" name="productname" id="productname" required="true">
            </div>
            <div>
                <label for="productSummaryShort">Korte omschrijving</label>
                <textarea type="text" id="productSummaryShort" name="productSummaryShort"  maxlength="200" required="true"></textarea>
            </div>
            <div>
                <label for="productSummaryLong">Lange omschrijving</label>
                <textarea type="text" id="productSummaryLong" name="productSummaryLong" class="longdescription" required="true"></textarea>
            </div>
            <div>
                <label for="characteristics">Kenmerken</label>
                <input type="text" id="characteristics" name="characteristics" required="true" placeholder="Kenmerk, Kenmerk, Kenmerk">
            </div>
            <div>
                <label for="price">Prijs</label>
                <input type="number" id="price" name="price" min="0.01" step="0.01" value="0.01" />
            </div>
            <div>
                <label for="brand">Merk</label>
                <input type="text" id="brand" name="brand" required="true">
            </div>
            <div>
                <label for="amount">Aantal op voorraad</label>
                <input type="number" min="1" step="1" value="1" name="amount" required="true">
            </div>

            <div>
                <label for="categoriesAddProduct">Categorienaam</label>
                <select type="text" id="categoriesAddProduct" id="categoriesAddProduct" name="categoriesAddProduct">
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
            </div>
            <div>
                <label for="image">Foto categorie</label>
                <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
            </div>

            <div><h4>Leverancier</h4></div>
            <div>
                <label for="suppliersAddProduct">Kies uw leverancier</label>
                <select type="text" id="suppliersAddProduct" name="suppliersAddProduct" onchange="grabInfo(this, 'getSupplierInfo', 'contentDivAddProduct')">
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
            </div>

            <div id="contentDivAddProduct">
                <div>
                    <label for="suppliername">Naam</label>
                    <input type="text" id="suppliername" name="suppliername" required="true">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required="true">
                </div>
                <div>
                    <label for="telephonenumber">Telefoonnummer</label>
                    <input type="tel" id="telephonenumber" name="telephonenumber" required="true">
                </div>
                <div>
                    <label for="streetname">Adres</label>
                    <input type="text" name="streetname" required="true" placeholder="Straatnaam">
                </div>
                <div>
                    <label></label>
                    <input type="text" name="housenumber" required="true" placeholder="Huisnummer">
                </div>
                <div>
                    <label></label>
                    <input type="text" name="housenumberSuffix" placeholder="Huisnummertoevoeging">
                </div>
                <div>
                    <label for="postalCode">Postcode</label>
                    <input type="text" id="postalCode" name="postalCode" required="true">
                </div>
                <div>
                    <label for="city">Woonplaats</label>
                    <input type="text" id="city" name="city" required="true">
                </div>
            </div>
            <div>
                <label></label>
                <input type="submit" value="Toevoegen" id="addProduct" class="button"/>
            </div>
        </form>

        <form action="handlers/EditProductHandler.php" method="POST" enctype="multipart/form-data">
            <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cat', 0);?>
            <div>
                <h3>Product wijzigen</h3>
            </div>
            <div>
                <label for="categoriesEditProduct">Categorienaam</label>
                <select type="text" id="categoriesEditProduct" name="categoriesEditProduct" onchange="grabInfo(this, 'getProductsFromCategoryEditProduct', 'contentDivEditProduct1');">
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
                        <?php if ($_smarty_tpl->tpl_vars['cat']->value === '') {?>
                            <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable($_smarty_tpl->tpl_vars['parent']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cat', 0);?>
                        <?php }?>
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
            </div>

            <div id="contentDivEditProduct1">
                <?php $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'product', 0);?>
                <div><label for="productToEdit">Productnaam</label>
                    <select type="text" id="productToEdit" name="productToEdit" onchange="grabInfo(this, 'getProductAndSupplierInfoEditProduct', 'contentDivEditProduct2')">
                        <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_productitem_5_saved_item = isset($_smarty_tpl->tpl_vars['productitem']) ? $_smarty_tpl->tpl_vars['productitem'] : false;
$_smarty_tpl->tpl_vars['productitem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['productitem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['productitem']->value) {
$_smarty_tpl->tpl_vars['productitem']->_loop = true;
$__foreach_productitem_5_saved_local_item = $_smarty_tpl->tpl_vars['productitem'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['productitem']->value->categoryId === $_smarty_tpl->tpl_vars['cat']->value->id) {?>
                                <?php if ($_smarty_tpl->tpl_vars['product']->value === '') {?>
                                    <?php $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable($_smarty_tpl->tpl_vars['productitem']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'product', 0);?>
                                <?php }?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['productitem']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['productitem']->value->name;?>
</option>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['productitem'] = $__foreach_productitem_5_saved_local_item;
}
if ($__foreach_productitem_5_saved_item) {
$_smarty_tpl->tpl_vars['productitem'] = $__foreach_productitem_5_saved_item;
}
?>
                    </select></div>
                    
                <div id="contentDivEditProduct2">
                    <div><h4>Productinformatie</h4></div>
                    <div>
                        <label for="productname">Productnaam</label>
                        <input type="text" name="productnameEditProduct" id="productname" required="true" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
">
                    </div>
                    <div>
                        <label for="productSummaryShort">Korte omschrijving</label>
                        <textarea type="text" id="productSummaryShort" name="productSummaryShortEditProduct"  maxlength="200" required="true"><?php echo $_smarty_tpl->tpl_vars['product']->value->shortDescription;?>
</textarea>
                    </div>
                    <div>
                        <label for="productSummaryLong">Lange omschrijving</label>
                        <textarea type="text" id="productSummaryLong" name="productSummaryLongEditProduct" class="longdescription" required="true"><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</textarea>
                    </div>
                    <div>
                        <label for="characteristics">Kenmerken</label>
                        <input type="text" id="characteristics" name="characteristicsEditProduct" required="true" placeholder="Kenmerk, Kenmerk, Kenmerk" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->characteristics;?>
">
                    </div>
                    <div>
                        <label for="price">Prijs</label>
                        <input type="number" id="price" name="priceEditProduct" min="0.01" step="0.01" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
"/>
                    </div>
                    <div>
                        <label for="brand">Merk</label>
                        <input type="text" id="brand" name="brandEditProduct" required="true" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->brand;?>
">
                    </div>
                    <div>
                        <label for="amountEditProduct">Aantal op voorraad</label>
                        <input type="number" min="1" step="1" name="amountEditProduct" required="true" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->amount;?>
">
                    </div>

                    <div>
                        <label for="categoriesEditProduct">Categorienaam</label>
                        <select type="text" id="categoriesAddProduct" id="categoriesAddProduct" name="categoriesAddProduct">
                            <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_6_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_6_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                                <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_7_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_7_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                                    <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                        <option class="subcategory" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                                    <?php }?>
                                <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_7_saved_local_item;
}
if ($__foreach_child_7_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_7_saved_item;
}
?>
                            <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_6_saved_local_item;
}
if ($__foreach_parent_6_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_6_saved_item;
}
?>
                        </select>
                    </div>
                    <div>
                        <label for="image">Foto categorie</label>
                        <input type="file" accept="image/*" name="image" id="image" class="input_text"/>
                    </div>
                    <div>
                        <img type="image" src="/Plug_IT/assets/pix/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
.png" class="image" />
                    </div>

                    <div><h4>Leverancier</h4></div>
                    <?php $_smarty_tpl->tpl_vars['supplier'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'supplier', 0);?>
                    <div>
                        <label for="suppliersEditProduct">Kies uw leverancier</label>
                        <select type="text" id="suppliersAddProduct" name="suppliersAddProduct" onchange="grabInfo(this, 'getSupplierInfo', 'contentDivEditProduct3')">
                            <option value="">Nieuwe leverancier</option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['suppliers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_supplieritem_8_saved_item = isset($_smarty_tpl->tpl_vars['supplieritem']) ? $_smarty_tpl->tpl_vars['supplieritem'] : false;
$_smarty_tpl->tpl_vars['supplieritem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['supplieritem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['supplieritem']->value) {
$_smarty_tpl->tpl_vars['supplieritem']->_loop = true;
$__foreach_supplieritem_8_saved_local_item = $_smarty_tpl->tpl_vars['supplieritem'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['supplieritem']->value->name === $_smarty_tpl->tpl_vars['product']->value->supplier) {?>
                                    <?php $_smarty_tpl->tpl_vars['supplier'] = new Smarty_Variable($_smarty_tpl->tpl_vars['supplieritem']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'supplier', 0);?>
                                    <option id="<?php echo $_smarty_tpl->tpl_vars['supplieritem']->value->name;?>
" value="<?php echo $_smarty_tpl->tpl_vars['supplieritem']->value->name;?>
" selected><?php echo $_smarty_tpl->tpl_vars['supplieritem']->value->name;?>
</option>
                                <?php } else { ?>
                                    <option id="<?php echo $_smarty_tpl->tpl_vars['supplieritem']->value->name;?>
" value="<?php echo $_smarty_tpl->tpl_vars['supplieritem']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['supplieritem']->value->name;?>
</option>
                                <?php }?>

                            <?php
$_smarty_tpl->tpl_vars['supplieritem'] = $__foreach_supplieritem_8_saved_local_item;
}
if ($__foreach_supplieritem_8_saved_item) {
$_smarty_tpl->tpl_vars['supplieritem'] = $__foreach_supplieritem_8_saved_item;
}
?>
                        </select>
                    </div>

                    <div id="contentDivEditProduct3">

                        <div>
                            <label for="suppliername">Naam</label>
                            <input type="text" id="suppliername" name="suppliernameEditProduct" required="true" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->name;?>
" readonly>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="emailEditProduct" required="true" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->email;?>
" readonly>
                        </div>
                        <div>
                            <label for="telephonenumber">Telefoonnummer</label>
                            <input type="tel" id="telephonenumber" name="telephonenumberEditProduct" required="true" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->telephonenumber;?>
" readonly>
                        </div>
                        <div>
                            <label for="streetname">Adres</label>
                            <input type="text" name="streetnameEditProduct" required="true" placeholder="Straatnaam" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->streetname;?>
" readonly>
                        </div>
                        <div>
                            <label></label>
                            <input type="text" name="housenumberEditProduct" required="true" placeholder="Huisnummer" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->housenumber;?>
" readonly>
                        </div>
                        <div>
                            <label></label>
                            <input type="text" name="housenumberSuffixEditProduct" placeholder="Huisnummertoevoeging" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->housenumber_suffix;?>
" readonly>
                        </div>
                        <div>
                            <label for="postalCode">Postcode</label>
                            <input type="text" id="postalCode" name="postalCodeEditProduct" required="true" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->postalCode;?>
" readonly>
                        </div>
                        <div>
                            <label for="city">Woonplaats</label>
                            <input type="text" id="city" name="cityEditProduct" required="true" value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->city;?>
" readonly>
                        </div>

                    </div>

                </div>
            </div>

            <div>
                <label></label>
                <input type="submit" value="Wijzigen" id="editCategory" class="button"/>
            </div>
        </form>





        <form method="POST" enctype="multipart/form-data" onsubmit="removeProduct(this, event);">
            <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cat', 0);?>
            <div>
                <h3>Product verwijderen</h3>
            </div>
            <div>
                <label for="categoriesRemoveProduct">Categorienaam</label>
                <select type="text" id="categories_remove" id="categoriesRemoveProduct" name="categoriesRemoveProduct" onchange="grabInfo(this, 'getProductsFromCategoryRemoveProduct', 'contentDivRemoveProduct')">
                    <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_9_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_9_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['cat']->value === '') {?>
                            <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable($_smarty_tpl->tpl_vars['parent']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cat', 0);?>
                        <?php }?>
                        <option class="category" id="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_10_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_10_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                <option class="subcategory" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_10_saved_local_item;
}
if ($__foreach_child_10_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_10_saved_item;
}
?>
                    <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_9_saved_local_item;
}
if ($__foreach_parent_9_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_9_saved_item;
}
?>
                </select>
            </div>
            <div id="contentDivRemoveProduct">

                <div><label for="productToRemove">Productnaam</label>
                    <select type="text" id="productToRemove" name="productToRemove">
                        <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_product_11_saved_item = isset($_smarty_tpl->tpl_vars['product']) ? $_smarty_tpl->tpl_vars['product'] : false;
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$__foreach_product_11_saved_local_item = $_smarty_tpl->tpl_vars['product'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->categoryId === $_smarty_tpl->tpl_vars['cat']->value->id) {?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</option>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_11_saved_local_item;
}
if ($__foreach_product_11_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_11_saved_item;
}
?>
                    </select></div>
            </div>

            <div>
                <label></label>
                <input type="submit" value="Verwijderen" id="removeCategory" class="button"/>
            </div>
        </form>






        
    </div>
<?php
}
/* {/block 'productsforms'} */
}
