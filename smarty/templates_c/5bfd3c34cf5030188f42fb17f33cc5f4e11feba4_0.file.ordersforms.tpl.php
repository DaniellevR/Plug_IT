<?php
/* Smarty version 3.1.29, created on 2016-04-03 16:11:43
  from "C:\wamp\www\Plug_IT\smarty\templates\ordersforms.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5701249f1f9237_21131181',
  'file_dependency' => 
  array (
    '5bfd3c34cf5030188f42fb17f33cc5f4e11feba4' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\ordersforms.tpl',
      1 => 1459692168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin.tpl' => 1,
  ),
),false)) {
function content_5701249f1f9237_21131181 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'ordersforms', array (
  0 => 'block_175755701249f081687_88797013',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'ordersforms'}  file:ordersforms.tpl */
function block_175755701249f081687_88797013($_smarty_tpl, $_blockParentStack) {
?>

    <div class="adminpart">
        <form method="POST" enctype="multipart/form-data" onsubmit="">
            <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'user', 0);?>
            <?php $_smarty_tpl->tpl_vars['username'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'username', 0);?>

            <?php if (isset($_smarty_tpl->tpl_vars['usernameCartAdmin']->value)) {?>
                <?php $_smarty_tpl->tpl_vars['username'] = new Smarty_Variable($_smarty_tpl->tpl_vars['usernameCartAdmin']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'username', 0);?>
            <?php }?>

            <div>
                <h3>Order toevoegen</h3>
            </div>

            <div>
                <label for="usersAddOrder">Gebruikersnaam</label>
                <select type="text" id="usersAddOrder" name="userAddOrder">
                    <?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_useritem_0_saved_item = isset($_smarty_tpl->tpl_vars['useritem']) ? $_smarty_tpl->tpl_vars['useritem'] : false;
$_smarty_tpl->tpl_vars['useritem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['useritem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['useritem']->value) {
$_smarty_tpl->tpl_vars['useritem']->_loop = true;
$__foreach_useritem_0_saved_local_item = $_smarty_tpl->tpl_vars['useritem'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['useritem']->value->username === $_smarty_tpl->tpl_vars['username']->value) {?>
                            <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable($_smarty_tpl->tpl_vars['useritem']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'user', 0);?>
                            <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
" id="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
" selected><?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
</option>
                        <?php } else { ?>
                            <?php if ($_smarty_tpl->tpl_vars['user']->value === '' && $_smarty_tpl->tpl_vars['username']->value === '') {?>
                                <?php $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable($_smarty_tpl->tpl_vars['useritem']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'user', 0);?>
                            <?php }?>
                            <option class="category" value="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
" id="<?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
"><?php echo $_smarty_tpl->tpl_vars['useritem']->value->username;?>
</option>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['useritem'] = $__foreach_useritem_0_saved_local_item;
}
if ($__foreach_useritem_0_saved_item) {
$_smarty_tpl->tpl_vars['useritem'] = $__foreach_useritem_0_saved_item;
}
?>
                </select>
            </div>
            <div id="contentDivAddOrder">
                <?php if ($_smarty_tpl->tpl_vars['user']->value !== '') {?>
                    <div><h5>Bezorgadres</h5></div>
                    <div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameDelivery" required="true" placeholder="Straatnaam" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->streetname;?>
"></div>
                    <div><label></label><input type="text" name="housenumberDelivery" required="true" placeholder="Huisnummer" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->housenumber;?>
"></div>
                    <div><label></label><input type="text" name="housenumberSuffixDelivery" placeholder="Huisnummertoevoeging" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->housenumber_suffix;?>
"></div>
                    <div><label for="postalCode">Postcode</label><input type="text" name="postalCodeDelivery" required="true" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->postalCode;?>
"></div>
                    <div><label for="city">Woonplaats</label><input type="text" name="cityDelivery" required="true" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
"></div>

                    <div><h5>Factuuradres</h5></div>
                    <div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameBilling" required="true" placeholder="Straatnaam" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->streetname;?>
"></div>
                    <div><label></label><input type="text" name="housenumberBilling" required="true" placeholder="Huisnummer" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->housenumber;?>
"></div>
                    <div><label></label><input type="text" name="housenumberSuffixBilling" placeholder="Huisnummertoevoeging" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->housenumber_suffix;?>
"></div>
                    <div><label for="postalCode">Postcode</label><input type="text" name="postalCodeBilling" required="true" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->postalCode;?>
"></div>
                    <div><label for="city">Woonplaats</label><input type="text" name="cityBilling" required="true" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->city;?>
"></div>
                    <?php }?>
            </div>

            <div>
                <div><h5>Productaanbod</h5></div>
                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'cat', 0);?>
                <div>
                    <label for="categoriesAddOrder">Categorienaam</label>
                    <select type="text" id="categoriesAddOrder" name="categoriesAddOrder" onchange="grabInfo(this, 'getProductsFromCategoryAddOrder', 'contentDivAddOrder')">
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
$__foreach_child_2_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_2_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                                <?php if ($_smarty_tpl->tpl_vars['child']->value->parent === $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                                    <option class="subcategory" id="<?php echo $_smarty_tpl->tpl_vars['child']->value->id;?>
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
                <div id="contentDivAddOrder">
                    <div><label for="productslist">Productnaam</label>
                        <select type="text" id="productslist" name="productslist">
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
                                <?php if ($_smarty_tpl->tpl_vars['product']->value->categoryId === $_smarty_tpl->tpl_vars['cat']->value->id) {?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</option>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_3_saved_local_item;
}
if ($__foreach_product_3_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_3_saved_item;
}
?>
                        </select>
                    </div>

                    <div>
                        <label for="amount">Aantal</label>
                        <input type="number" min="1" step="1" value="1" name="amount" required="true">
                    </div>
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="addOrder" value="addProduct">Product toevoegen</button>
                </div>
            </div>
            <div>
                <div><h5>Bestelling</h5></div>
                <div>
                    <?php $_smarty_tpl->tpl_vars['count'] = new Smarty_Variable(count($_smarty_tpl->tpl_vars['productsCartAdmin']->value), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'count', 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['count']->value === 0) {?>
                        U heeft nog geen producten toegevoegd aan de order.
                    <?php } else { ?>
                        <ul>
                            <?php
$_from = $_smarty_tpl->tpl_vars['productsCartAdmin']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_product_4_saved_item = isset($_smarty_tpl->tpl_vars['product']) ? $_smarty_tpl->tpl_vars['product'] : false;
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$__foreach_product_4_saved_local_item = $_smarty_tpl->tpl_vars['product'];
?>
                                <li><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
 - Aantal : <input type="number" min="1" step="1" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->amountInCartAdmin;?>
" name="amount" required="true"></li>
                                <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_4_saved_local_item;
}
if ($__foreach_product_4_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_4_saved_item;
}
?>
                        </ul>
                    <?php }?>
                </div>
            </div>
            <div>
                <label></label>
                <button type="submit" name="addOrder" value="addOrder" class="button">Toevoegen</button>
            </div>
        </form>

        <form method="POST" enctype="multipart/form-data" onsubmit="editOrder(this, event)">
            <?php $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'order', 0);?>
            <div>
                <h3>Order wijzigen</h3>
            </div>

            <div><label for="orderlist">Ordernummer</label>
                <select type="text" id="orderlist" name="orderlist" onchange="grabInfo(this, 'getStatesEditOrder', 'contentDivEditOrder')">
                    <?php
$_from = $_smarty_tpl->tpl_vars['orders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_orderitem_5_saved_item = isset($_smarty_tpl->tpl_vars['orderitem']) ? $_smarty_tpl->tpl_vars['orderitem'] : false;
$_smarty_tpl->tpl_vars['orderitem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['orderitem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['orderitem']->value) {
$_smarty_tpl->tpl_vars['orderitem']->_loop = true;
$__foreach_orderitem_5_saved_local_item = $_smarty_tpl->tpl_vars['orderitem'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value === '') {?>
                            <?php $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable($_smarty_tpl->tpl_vars['orderitem']->value, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'order', 0);?>
                        <?php }?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['orderitem']->value->id;?>
" id="<?php echo $_smarty_tpl->tpl_vars['orderitem']->value->state;?>
"><?php echo $_smarty_tpl->tpl_vars['orderitem']->value->id;?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['orderitem'] = $__foreach_orderitem_5_saved_local_item;
}
if ($__foreach_orderitem_5_saved_item) {
$_smarty_tpl->tpl_vars['orderitem'] = $__foreach_orderitem_5_saved_item;
}
?>
                </select>
            </div>

            <div id="contentDivEditOrder">
                <label>Status</label><select type="text" name="statesEditOrder">
                    <?php
$_from = $_smarty_tpl->tpl_vars['states']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_state_6_saved_item = isset($_smarty_tpl->tpl_vars['state']) ? $_smarty_tpl->tpl_vars['state'] : false;
$_smarty_tpl->tpl_vars['state'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['state']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
$__foreach_state_6_saved_local_item = $_smarty_tpl->tpl_vars['state'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value->state === $_smarty_tpl->tpl_vars['state']->value) {?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['state']->value;?>
</option>
                        <?php } else { ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['state']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['state']->value;?>
</option>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['state'] = $__foreach_state_6_saved_local_item;
}
if ($__foreach_state_6_saved_item) {
$_smarty_tpl->tpl_vars['state'] = $__foreach_state_6_saved_item;
}
?>
                </select>
            </div>

            <div>
                <label></label>
                <button type="submit" name="addOrder" value="addOrder" class="button">Wijzigen</button>
            </div>
        </form>
    </div>
<?php
}
/* {/block 'ordersforms'} */
}
