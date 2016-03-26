<?php
/* Smarty version 3.1.29, created on 2016-03-26 19:29:42
  from "C:\wamp\www\Plug_IT\smarty\templates\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f6d516c7a912_05095261',
  'file_dependency' => 
  array (
    '88834233b4183b2e4e76ec176ae20331b0c98e41' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\admin.tpl',
      1 => 1459016918,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56f6d516c7a912_05095261 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_644156f6d516a53146_57874447',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:admin.tpl */
function block_644156f6d516a53146_57874447($_smarty_tpl, $_blockParentStack) {
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
                
                <form action="#" id="addCategoryForm">
                    <div class="line">
                        <label>Categorienaam:</label>
                        <div class="input">
                            <input id="categorynameAdd" type="text" name="categorynameAdd" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Omschrijving:</label>
                        <div class="input">
                            <input id="categoryDescriptionAdd" type="text" name="category_descriptionAdd" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Ouder categorie:</label>
                        <div class="input">
                            <select id="categoriesAdd" name="formParentCategoriesAdd">
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
                        </div>
                    </div>
                    <div class="line">
                        <label>Foto categorie:</label>
                        <div class="input">
                            
                            <input type="file" name="image" required="true" >
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>

                <form action="" onsubmit="editCategory(this, event)" method="POST" enctype="multipart/form-data">
                    <div class="line">
                        <label>Categorienaam:</label>
                        <div class="input">
                            <select id="categories_edit" name="categoriesEdit">
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
                                    <option class="category" id="opt<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
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
                                            <option class="subcategory" id="opt<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
;<?php echo $_smarty_tpl->tpl_vars['j']->value++;?>
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
                    <div class="line">
                        <label>Omschrijving:</label>
                        <div class="input">
                            <input id="desc" type="text" name="category_description" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Ouder categorie:</label>
                        <div class="input">
                            <select name="formParentCategories">
                                <option value="">-</option>
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
                                    <option><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
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
                    <div class="line">
                        <label>Foto categorie:</label>
                        <div class="input">
                            <input type="file" accept="image/*" name="image" id="image" required="true"/>
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>

                <form action="" onsubmit="removeCategory(this, event)" method="POST" enctype="multipart/form-data">
                    <div class="line">
                        <label>Categorie:</label>
                        <div class="input">
                            <select id="categories_remove" name="categoriesRemove">
                                <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_4_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_4_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                                    <option class="category"><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['categories']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_5_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_5_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                                        <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                            <option class="subcategory"><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
</option>
                                        <?php }?>
                                    <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_5_saved_local_item;
}
if ($__foreach_child_5_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_5_saved_item;
}
?>
                                <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_4_saved_local_item;
}
if ($__foreach_parent_4_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_4_saved_item;
}
?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Verwijderen</button>
                </form>
            </div>

            <div class="products adminpart" id="part2">
                <ul class="admin_list">
                </ul>

                <form>
                    <div class="line">
                        <label>Productnaam:</label>
                        <div class="input">
                            <input type="text" name="productnaam" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Omschrijving:</label>
                        <div class="input">
                            <input type="text" name="product_omschrijving" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Prijs:</label>
                        <div class="input">
                            <input type="number" min="0.01" step="0.01" value="0.01" />
                        </div>
                    </div>
                    <!--<span class="currencyinput">â‚¬<input type="number" min="0.01" step="0.01" value="0.01" name="price"></span><br/>-->
                    <div class="line">
                        <label>Foto product:</label>
                        <div class="input">
                            <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>

                <form>
                    <div class="line">
                        <label>Categorienaam:</label>
                        <div class="input">
                            <select name="Categories">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Verwijderen</button>
                </form>
            </div>

            <div class="users adminpart" id="part3">
                <form>
                    <div class="line">
                        <label>Gebruikersnaam:</label>
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
                            <input type="password" name="repeat_password" required="true"><br/>
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>
            </div>

            <div class="orders adminpart" id="part4">
                <form>
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
