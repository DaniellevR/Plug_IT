<?php
/* Smarty version 3.1.29, created on 2016-03-29 13:21:38
  from "C:\wamp\www\Plug_IT\smarty\templates\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fa6542789076_68376162',
  'file_dependency' => 
  array (
    '88834233b4183b2e4e76ec176ae20331b0c98e41' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\admin.tpl',
      1 => 1459250470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fa6542789076_68376162 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_356856fa654261a6b2_67566285',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:admin.tpl */
function block_356856fa654261a6b2_67566285($_smarty_tpl, $_blockParentStack) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" src="/Plug_IT/assets/js/adminPanelNavigation.js"><?php echo '</script'; ?>
>
    <div class="content admin">
        <h1 class="test">Admin</h1>

        <?php if (isset($_COOKIE['PHPSESSID'])) {?>
            
            <ul class="adminpnl" id="parts">
                <li><a href="#part1">Categorieën</a></li>
                <li><a href="#part2">Producten</a></li>
                <li><a href="#part3">Gebruikers</a></li>
                <li><a href="#part4">Orders</a></li>
            </ul>

            <div class="categories adminpart" id="part1">
                <form action="handlers/UploadCategoryHandler.php" method="POST" enctype="multipart/form-data">
                    <h3>Categorie toevoegen</h3>
                    <label>Categorienaam:</label>
                    <input type="text" name="categoryname" required="true">
                    <label>Omschrijving:</label>
                    <input type="text" name="category_description" required="true">
                    <label>Ouder categorie:</label>
                    <select id="categoriesAdd" name="parent">
                        <option value="">-</option>
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
                            <option value="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_local_item;
}
if ($__foreach_parent_0_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_item;
}
?>
                    </select>
                    <label>Foto categorie:</label>
                    <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>

                <form action="handlers/EditCategoryHandler.php" method="POST" enctype="multipart/form-data">
                    <h3>Categorie wijzigen</h3>
                    <div class="line">
                        <label>Categorienaam:</label>
                        <div class="input">
                            <select id="categories_edit" name="categoriesEdit" onchange="grabInfo(this, 'editCategory', 'contentDivEditCategory')">
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_1_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_1_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                                    <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                                    <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'j', 0);?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_2_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_2_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                                        <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                            <option class="subcategory" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                                        <?php }?>
                                    <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_2_saved_local_item;
}
if ($__foreach_child_2_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_2_saved_item;
}
?>
                                    <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

                                <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_1_saved_local_item;
}
if ($__foreach_parent_1_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_1_saved_item;
}
?>
                            </select>
                        </div>
                    </div>
                    <div id="contentDivEditCategory"></div>
                    <button type="submit" value="Submit" class="form_button">Wijzigen</button>
                </form>

                <form method="POST" enctype="multipart/form-data" onsubmit="removeCategory(this, event)">
                    <h3>Categorie verwijderen</h3>
                    <div class="line">
                        <label>Categorienaam:</label>
                        <div class="input">
                            <select id="categories_remove" name="categoriesRemove">
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
                                    <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
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
                                            <option class="subcategory" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
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
                    </div>
                    <button type="submit" value="Submit" class="form_button">Verwijderen</button>
                </form>
            </div>

            

            <div class="products adminpart" id="part2">
                <form>
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
                    <input type="number" min="0.01" step="0.01" value="0.01" />
                    <label>Merk:</label>
                    <input type="text" name="brand" required="true">
                    <label>Foto product:</label>
                    <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
                    <label>Categorienaam:</label>
                    <select id="categoriesAddProduct" name="categoriesAddProduct">
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
                            <option class="category"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
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
                                    <option class="subcategory"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
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
                    
                    <h5>Leverancier</h5>
                    <label>Bestaande leverancier:</label>
                    <select name="suppliersAddProduct">
                        <option value="">-</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['suppliers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_supplier_7_saved_item = isset($_smarty_tpl->tpl_vars['supplier']) ? $_smarty_tpl->tpl_vars['supplier'] : false;
$_smarty_tpl->tpl_vars['supplier'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['supplier']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['supplier']->value) {
$_smarty_tpl->tpl_vars['supplier']->_loop = true;
$__foreach_supplier_7_saved_local_item = $_smarty_tpl->tpl_vars['supplier'];
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['supplier']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['supplier']->value->name;?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['supplier'] = $__foreach_supplier_7_saved_local_item;
}
if ($__foreach_supplier_7_saved_item) {
$_smarty_tpl->tpl_vars['supplier'] = $__foreach_supplier_7_saved_item;
}
?>
                    </select>
                    
                    <label>Naam:</label>
                    <input type="text" name="suppliername" required="true">
                    <label>Adres:</label>
                    <input type="text" name="streetname" required="true" placeholder="Straatnaam">
                    <input class="small_field" type="text" name="housenumber" required="true" placeholder="nr">
                    <input class="small_field" type="text" name="housenumberSuffix" required="true" placeholder="tv">
                    <label>Postcode:</label>
                    <input type="text" name="postalCode" required="true">
                    <label>Woonplaats:</label>
                    <input type="text" name="city" required="true">
                    
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
$__foreach_parent_8_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_8_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                            <option class="category" id="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_9_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_9_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                    <option class="subcategory" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_9_saved_local_item;
}
if ($__foreach_child_9_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_9_saved_item;
}
?>
                        <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_8_saved_local_item;
}
if ($__foreach_parent_8_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_8_saved_item;
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
$__foreach_parent_10_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_10_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                            <option class="category" id="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_11_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_11_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                    <option class="subcategory" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_11_saved_local_item;
}
if ($__foreach_child_11_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_11_saved_item;
}
?>
                        <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_10_saved_local_item;
}
if ($__foreach_parent_10_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_10_saved_item;
}
?>
                    </select>
                    <div id="contentDivRemoveProduct"></div>
                    <button type="submit" value="Submit" class="form_button">Verwijderen</button>
                </form>
            </div>

            

            <div class="users adminpart" id="part3">
                <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
                    <h3>Gebruiker toevoegen</h3>
                    <h5>Persoonsgegevens</h5>
                    <label>Naam:</label>
                    <input type="text" name="firstname" required="true" placeholder="Voornaam">
                    <input type="text" name="prefix" required="true" placeholder="tv">
                    <input type="text" name="lastname" required="true" placeholder="Achternaam">
                    <label>Email:</label>
                    <input type="text" name="email" required="true">
                    <label>Telefoonnummer:</label>
                    <input type="text" name="telephonenumber" required="true">
                    <h5>Adresgegevens</h5>
                    <label>Adres:</label>
                    <input type="text" name="streetnameAddUser" required="true" placeholder="Straatnaam">
                    <input type="text" name="housenumberAddUser" required="true" placeholder="nr">
                    <input type="text" name="housenumberSuffixAddUser" required="true" placeholder="tv">
                    <label>Postcode:</label>
                    <input type="text" name="postalCodeAddUser" required="true">
                    <label>Woonplaats:</label>
                    <input type="text" name="cityAddUser" required="true">
                    <h5>Accountgegevens</h5>
                    <label>Gebruikersnaam:</label><input type="text" name="username" required="true">
                    <label>Rol:</label><select name="roles"><option value="User">Gebruiker</option><option value="Admin">Admin</option></select>
                    <label>Wachtwoord:</label><input type="password" name="password" required="true">
                    <label>Herhaal wachtwoord:</label><input type="password" name="repeat_password" required="true"><br/>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>
            </div>

            

            <div class="orders adminpart" id="part4">
                <form>
                    <h3>Order toevoegen</h3>
                    <div class="line">
                        <label>Ordernaam:</label>
                        <div class="input">
                            <input type="text" name="username" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Type:</label>
                        <div class="input">
                            <select name="types">
                                <option value="User">Gebruiker</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <label>Wachtwoord:</label>
                        <div class="input">
                            <input type="password" name="password" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Herhaal wachtwoord:</label>
                        <div class="input">
                            <input type="password" name="repeat_password" required="true">
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>
            </div>
        <?php } else { ?>
            <form action="" onsubmit="return login(this, event, 'Admin')" method="POST" enctype="multipart/form-data">
                <div class="line">
                    <label>Gebruikersnaam:</label>
                    <div class="input">
                        <div class="input">
                            <input type="text" name="username" required="true">
                        </div>
                    </div>
                    <label>Wachtwoord:</label>
                    <div class="input">
                        <div class="input">
                            <input type="password" name="password" required="true">
                        </div>
                    </div>
                </div>
                <button type="submit" value="Submit" class="form_button">Inloggen</button>
            </form>
        <?php }?>
    </div>
<?php
}
/* {/block 'body'} */
}
