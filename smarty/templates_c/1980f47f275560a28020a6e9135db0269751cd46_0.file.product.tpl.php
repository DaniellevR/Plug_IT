<?php
/* Smarty version 3.1.29, created on 2016-04-02 14:24:07
  from "C:\wamp\www\Plug_IT\smarty\templates\product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ffb9e7ef8c67_72119228',
  'file_dependency' => 
  array (
    '1980f47f275560a28020a6e9135db0269751cd46' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\product.tpl',
      1 => 1459435868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56ffb9e7ef8c67_72119228 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1755356ffb9e7ed8e98_64594476',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:product.tpl */
function block_1755356ffb9e7ed8e98_64594476($_smarty_tpl, $_blockParentStack) {
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
        </div>
    </div>
<?php
}
/* {/block 'body'} */
}
