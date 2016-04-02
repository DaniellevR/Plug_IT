<?php
/* Smarty version 3.1.29, created on 2016-04-03 00:47:53
  from "C:\wamp\www\Plug_IT\smarty\templates\cart.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57004c19215d43_30778112',
  'file_dependency' => 
  array (
    '891ef39fa8fe8179d535fb1624e9f4fd4349fdbb' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\cart.tpl',
      1 => 1459435871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_57004c19215d43_30778112 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1337857004c191aec83_61586368',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:cart.tpl */
function block_1337857004c191aec83_61586368($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Winkelwagen</h1>
        <?php if (isset($_smarty_tpl->tpl_vars['cartList']->value)) {?>
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
                <div class='productThumbnail'>
                    <img class='productImage' src='assets/pix/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
.png' alt='NO IMAGE' />
                    <a href='/Plug_IT/index.php?page=Product&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
'>
                        Naar productpagina
                    </a>
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
                    <div class="input">
                        <form action="/Plug_IT/index.php?page=Cart" method="post">
                            <input name="amount" type="number" min="1" step="1" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->amountInCart;?>
" />
                            <input name="page" value="Cart" hidden/>
                            <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" hidden/>
                            <input id="addToCartButton" type="submit" value="Bevestigen"/>
                        </form>
                        <form action="/Plug_IT/index.php?page=Cart" method="post">
                            <input name="removeId" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" hidden/>
                            <input id="removeFromCartButton" type="submit" value="Verwijderen"/>
                        </form>
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
                <input name="pay" value="true" hidden/>
                <input id="payButton" type="submit" value="Afrekenen"/>
            </form>
        <?php } else { ?>
            <h3>U heeft nog geen producten in uw winkelwagentje.</h3>
        <?php }?>
    </div>
<?php
}
/* {/block 'body'} */
}