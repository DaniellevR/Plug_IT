<?php
/* Smarty version 3.1.29, created on 2016-03-31 22:39:14
  from "C:\wamp\www\Plug_IT\smarty\templates\categoriesforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd8af27a2774_80213606',
  'file_dependency' => 
  array (
    'cda432c04ae081b50a0c310db67593e92d057eef' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\categoriesforms.tpl',
      1 => 1459456712,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
  ),
),false)) {
function content_56fd8af27a2774_80213606 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'categoriesforms', array (
  0 => 'block_2077156fd8af26822a3_31262342',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'categoriesforms'}  file:categoriesforms.tpl */
function block_2077156fd8af26822a3_31262342($_smarty_tpl, $_blockParentStack) {
?>

    <div class="adminpart">
        <form action="handlers/UploadCategoryHandler.php" method="POST" enctype="multipart/form-data">
            <div>
                <h3>Categorie toevoegen</h3>
            </div>
            <div>
                <label for="categoriesEdit">Categorienaam</label>
                <input type="text" id="categoryname" name="categoryname" required="true"/>
            </div>
            <div>
                <label for="category_description">Omschrijving</label>
                <input type="text" id="category_description" name="category_description" required="true"/>
            </div>
            <div>
                <label for="username">Ouder categorie</label>
                <select type="text" id="categoriesAdd" name="parent">
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
            <div>
                <label for="image">Foto categorie</label>
                <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
            </div>
            <div>
                <label></label>
                <input type="submit" value="Toevoegen" id="addCategory" class="button"/>
            </div>
        </form>


        <form action="handlers/EditCategoryHandler.php" method="POST" enctype="multipart/form-data">
            <div>
                <h3>Categorie wijzigen</h3>
            </div>
            <div>
                <label for="categoriesEdit">Categorienaam</label>
                <select type="text" id="categories_edit" id="categoriesEdit" name="categoriesEdit" onchange="grabInfo(this, 'editCategory', 'contentDivEditCategory')">
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

            <div>
                <label for="categoryNewName">Categorienaam</label>
                <input type="text" id="categoryNewName" name="newname" required="true" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value->name;?>
"/>
            </div>
            <div>
                <label for="categoryNewDescription">Omschrijving</label>
                <input type="text" id="categoryNewDescription" name="category_description" required="true" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value->description;?>
"/>
            </div>
            <div>
                <label for="categoriesParentEdit">Ouder categorie</label>
                <select type="text" id="categories_edit" id="categoriesParentEdit" name="parent" onchange="grabInfo(this, 'editCategory', 'contentDivEditCategory')">
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
                </select>
            </div>

            <div>
                <label for="imageEditCategory">Foto categorie</label>
                <input type="file" accept="image/*" name="image" id="imageEditCategory" class="input_text" required="true"/>
            </div>
            <div>
                <img type="image" src="/Plug_IT/assets/pix/categories/<?php echo $_smarty_tpl->tpl_vars['cat']->value->id;?>
.png" class="image" />
            </div>
        </div>
        <div>
            <label></label>
            <input type="submit" value="Wijzigen" id="addCategory" class="button"/>
        </div>
    </form>

    <form method="POST" enctype="multipart/form-data" onsubmit="removeCategory(this, event)">
        <div>
            <h3>Categorie verwijderen</h3>
        </div>
        <div>
            <label for="categories_remove">Categorienaam</label>
            <select type="text" id="categories_remove" name="categoriesRemove">
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
            <label></label>
            <button type="submit" value="Submit" class="button">Verwijderen</button>
        </div>
    </form>

</div>
<?php
}
/* {/block 'categoriesforms'} */
}
