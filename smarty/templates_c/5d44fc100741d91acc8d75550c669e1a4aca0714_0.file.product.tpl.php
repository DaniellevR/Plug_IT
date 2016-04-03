<?php
/* Smarty version 3.1.29, created on 2016-04-04 00:25:22
  from "C:\xampp\htdocs\Plug_IT\smarty\templates\product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57019852c18674_22828508',
  'file_dependency' => 
  array (
    '5d44fc100741d91acc8d75550c669e1a4aca0714' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\smarty\\templates\\product.tpl',
      1 => 1459722267,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_57019852c18674_22828508 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_338257019852c0ca40_68463628',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:product.tpl */
function block_338257019852c0ca40_68463628($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Product</h1>
        <div class='productInfo'>
            <div id='productTitle'>
                <h2>
                    <?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>

                </h2></div><div class='productImage'><img src='assets/pix/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
.png' alt='NO IMAGE' />
            </div>
            <div id='description'>
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>

                </p>
            </div>
            <div id='productBuy'>
                <p>€<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>

                </p>
            </div>
            <div class="input">
                <form action="/Plug_IT/index.php?page=Cart" method="post">
                    <input name="amount" type="number" min="1" step="1" value="1" />
                    <input name="page" value="Cart" hidden/>
                    <input name="id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" hidden/>
                    <input id="addToCartButton" type="submit" value="Toevoegen aan winkelwagentje"/>
                </form>
            </div>
        </div>
    </div>
<?php
}
/* {/block 'body'} */
}
