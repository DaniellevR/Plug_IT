<?php
/* Smarty version 3.1.29, created on 2016-04-02 23:23:50
  from "C:\wamp\www\Plug_IT\smarty\templates\orderAndDelivery.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_570038661c5f67_42690245',
  'file_dependency' => 
  array (
    'bdc709b723480bb18d2829e88852b1987008e39a' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\orderAndDelivery.tpl',
      1 => 1459432679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_570038661c5f67_42690245 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1512457003866175165_49463375',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:orderAndDelivery.tpl */
function block_1512457003866175165_49463375($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Bestelling en levering</h1>
        <?php if (isset($_smarty_tpl->tpl_vars['confirmed']->value)) {?>
            <h1>Order bevestigd!</h1>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['cartList']->value)) {?>
            <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'total', 0);?>
            <?php
$_from = $_smarty_tpl->tpl_vars['cartList']->value;
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
                <div class='orderInfo'>
                    <div class='productName'>
                        <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h4>
                    </div>
                    <div id='productBuy'><p>€<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</p>
                    </div>
                    <div>
                        <p>Aantal: <?php echo $_smarty_tpl->tpl_vars['product']->value->amountInCart;?>
</p>
                    </div>
                </div>
                <?php $_smarty_tpl->tpl_vars['total'] = new Smarty_Variable($_smarty_tpl->tpl_vars['total']->value+($_smarty_tpl->tpl_vars['product']->value->price*$_smarty_tpl->tpl_vars['product']->value->amountInCart), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'total', 0);?>
            <?php
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved_local_item;
}
if ($__foreach_product_0_saved_item) {
$_smarty_tpl->tpl_vars['product'] = $__foreach_product_0_saved_item;
}
?>
            <h3>Totaalprijs: €<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</h3>
            <form action="/Plug_IT/index.php?page=OrderAndDelivery" method="get">
                <input name="page" value="OrderAndDelivery" hidden/>
                <input name="confirmed" value="true" hidden/>
                <input id="confirmButton" type="submit" value="Akkoord"/>
            </form>
        <?php } else { ?>
            <h3>U heeft nog geen producten in uw winkelwagentje.</h3>
        <?php }?>
    </div>
<?php
}
/* {/block 'body'} */
}
