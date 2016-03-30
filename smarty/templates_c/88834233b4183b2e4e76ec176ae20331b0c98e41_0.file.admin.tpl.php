<?php
/* Smarty version 3.1.29, created on 2016-03-30 15:23:42
  from "C:\wamp\www\Plug_IT\smarty\templates\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fbd35e43add5_62271153',
  'file_dependency' => 
  array (
    '88834233b4183b2e4e76ec176ae20331b0c98e41' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\admin.tpl',
      1 => 1459344218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fbd35e43add5_62271153 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2768556fbd35e3d0398_83216979',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'categoriesforms'}  file:admin.tpl */
function block_50656fbd35e4150a0_63255278($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'categoriesforms'} */
/* {block 'productsforms'}  file:admin.tpl */
function block_1322756fbd35e41c707_83116278($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'productsforms'} */
/* {block 'usersforms'}  file:admin.tpl */
function block_1895256fbd35e423201_69095650($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'usersforms'} */
/* {block 'ordersforms'}  file:admin.tpl */
function block_963356fbd35e429d26_58112985($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'ordersforms'} */
/* {block 'body'}  file:admin.tpl */
function block_2768556fbd35e3d0398_83216979($_smarty_tpl, $_blockParentStack) {
?>

    
    <div class="content admin">
        <h1 class="test">Admin</h1>

        <?php if (isset($_COOKIE['PHPSESSID'])) {?>
            
            

            <ul class="adminpnl">
                <?php if ($_GET['page'] === 'AdminCategories') {?>
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminCategories">Categorieën</a></li>
                <?php } else { ?>
                    <li><a href="/Plug_IT/index.php?page=AdminCategories">Categorieën</a></li>
                <?php }?>
                <?php if ($_GET['page'] === 'AdminProducts') {?>
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminProducts">Producten</a></li>
                <?php } else { ?>
                    <li><a href="/Plug_IT/index.php?page=AdminProducts">Producten</a></li>
                <?php }?>
                <?php if ($_GET['page'] === 'AdminUsers') {?>
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminUsers">Gebruikers</a></li>
                <?php } else { ?>
                    <li><a href="/Plug_IT/index.php?page=AdminUsers">Gebruikers</a></li>
                <?php }?>
                <?php if ($_GET['page'] === 'AdminOrders') {?>
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminOrders">Orders</a></li>
                <?php } else { ?>
                    <li><a href="/Plug_IT/index.php?page=AdminOrders">Orders</a></li>
                <?php }?>
                

            </ul>

        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'categoriesforms', array (
  0 => 'block_50656fbd35e4150a0_63255278',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>


        

    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'productsforms', array (
  0 => 'block_1322756fbd35e41c707_83116278',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>


    

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'usersforms', array (
  0 => 'block_1895256fbd35e423201_69095650',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>




<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'ordersforms', array (
  0 => 'block_963356fbd35e429d26_58112985',
  1 => false,
  3 => 0,
  2 => 0,
), $_blockParentStack);
?>


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
