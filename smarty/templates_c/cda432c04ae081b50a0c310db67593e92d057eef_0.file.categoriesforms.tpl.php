<?php
/* Smarty version 3.1.29, created on 2016-03-30 23:33:22
  from "C:\wamp\www\Plug_IT\smarty\templates\categoriesforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fc4622838ef5_29937149',
  'file_dependency' => 
  array (
    'cda432c04ae081b50a0c310db67593e92d057eef' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\categoriesforms.tpl',
      1 => 1459373499,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
  ),
),false)) {
function content_56fc4622838ef5_29937149 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'categoriesforms', array (
  0 => 'block_119656fc4622713782_25171440',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'categoriesforms'}  file:categoriesforms.tpl */
function block_119656fc4622713782_25171440($_smarty_tpl, $_blockParentStack) {
?>

    <div class="adminpart">
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
                    <select id="categories_edit" id="categoriesEdit" name="categoriesEdit" onchange="grabInfo(this, 'editCategory', 'contentDivEditCategory')">
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
            <div id="contentDivEditCategory">

                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cat', 0);?>
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
                <?php if ($_smarty_tpl->tpl_vars['cat']->value === '') {
$_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable($_smarty_tpl->tpl_vars['parent']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cat', 0);
}?>
            <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_3_saved_local_item;
}
if ($__foreach_parent_3_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_3_saved_item;
}
?>

            <div class="line"><label>Nieuwe naam:</label><div class="input"><input id="newname" type="text" name="newname" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
" required="true"></div></div>
            <div class="line"><label>Omschrijving:</label><div class="input"><input id="desc" type="text" name="category_description" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value->description;?>
" required="true"></div></div>
            <div class="line"><label>Ouder categorie:</label><div class="input"><select name="parent">


                        <option value="">-</option>
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
                            <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['parent']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
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
                                    <option class="subcategory" value="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value->parent === $_smarty_tpl->tpl_vars['child']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
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


                    </select></div></div>
            <div class="line"><label>Foto categorie:</label><div class="input"><input type="file" accept="image/*" name="image" id="image"/></div></div>

            <img src="/Plug_IT/assets/pix/categories/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
.png" class="image" />
        </div>
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
        </div>
        <button type="submit" value="Submit" class="form_button">Verwijderen</button>
    </form>
</div>
<?php
}
/* {/block 'categoriesforms'} */
}
