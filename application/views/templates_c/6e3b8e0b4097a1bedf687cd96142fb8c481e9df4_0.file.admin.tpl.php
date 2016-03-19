<?php
/* Smarty version 3.1.29, created on 2016-03-19 18:20:06
  from "C:\wamp\www\Plug_IT\Application\views\templates\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ed8a46f01a98_50358429',
  'file_dependency' => 
  array (
    '6e3b8e0b4097a1bedf687cd96142fb8c481e9df4' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\Application\\views\\templates\\admin.tpl',
      1 => 1458408001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:navigation.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_56ed8a46f01a98_50358429 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="javascript">
    var id = -1;

    $(document).on("hover", ".adminpanel ul li", function() {
        var i = $(this).index();
        $('#item' + (i + 1)).css("background-color", "#EAF2F5");
    }).on("mouseout", ".adminpanel ul li", function() {
        var i = $(this).index();
        if (i !== id) {
            $('#item' + (i + 1)).css("background-color", "lightblue");
        }
    });


    $(document).ready(function() {
        $('.adminpanel ul li').click(function() {
            var i = $(this).index();
            id = i;
            $('.menu_item').css("background-color", "lightblue");
            $('#item' + (i + 1)).css("background-color", "#e6f2ff");
            $('.fullarticle').hide();
            $('#article' + (i + 1)).show();
        });
    });
<?php echo '</script'; ?>
>

<div class="content">
    <h1>Admin</h1>

    <div class="adminpanel">
        <ul>
            <li class="menu_item" id="item1">Categorieën</li>
            <li class="menu_item" id="item2">Producten</li>
            <li class="menu_item" id="item3">Gebruikers</li>
            <li class="menu_item" id="item4">Orders</li>
        </ul>
    </div>

    <div class="categories fullarticle" id="article1">      
        <form action="" method="POST" enctype="multipart/form-data">
            Categorienaam:<br/>
            <input type="text" name="categoryname" required="true"><br/>
            Omschrijving:<br/>
            <input type="text" name="category_description" required="true"><br/>
            Ouder categorie:<br/>
            <select name="formParentCategories">
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
                    <option><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
                <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_local_item;
}
if ($__foreach_parent_0_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_item;
}
?>
            </select><br/>
            <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/><br/>
            <input type="submit" value="Toevoegen">
        </form>
        <form>
            Categorie:<br/>
            <select name="Categories">
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
                    <option>'<?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
'</option>

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
                        <?php if ($_smarty_tpl->tpl_vars['child']->value->parent == $_smarty_tpl->tpl_vars['parent']->value->id) {?>
                            <option>'<?php echo $_smarty_tpl->tpl_vars['child']->value->name;?>
' uit categorie '<?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
'</option>
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


                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br/>
            <input type="submit" value="Verwijderen">
        </form>
    </div>

    <div class="products fullarticle" id="article2">
        <ul class="admin_list">
        </ul>

        <form>
            Productnaam:<br/>
            <input type="text" name="productnaam" required="true"><br/>
            Omschrijving:<br/>
            <input type="text" name="product_omschrijving" required="true"><br/>
            Prijs:<br/>
            <input type="number" min="0.01" step="0.01" value="0.01" /><br/>
            <!--<span class="currencyinput">€<input type="number" min="0.01" step="0.01" value="0.01" name="price"></span><br/>-->
            <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/><br/>
            <input type="submit" value="Toevoegen">
        </form>
        <form>
            Categorienaam:<br/>
            <select name="Categories">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br/>
            <input type="submit" value="Verwijderen">
        </form>
    </div>

    <div class="users fullarticle" id="article3">
        <form>
            Gebruikersnaam:<br/>
            <input type="text" name="username" required="true"><br/>
            Type:<br/>
            <select name="types">
                <option value="User">Gebruiker</option>
                <option value="Admin">Admin</option>
            </select><br/>
            Wachtwoord:<br/>
            <input type="password" name="password" required="true"><br/>
            Herhaal wachtwoord:<br/>
            <input type="password" name="repeat_password" required="true"><br/>
            <input type="submit" value="Toevoegen">
        </form>
    </div>

    <div class="orders fullarticle" id="article4">
        <form>
            Gebruikersnaam:<br/>
            <input type="text" name="username" required="true"><br/>
            Type:<br/>
            <select name="types">
                <option value="User">Gebruiker</option>
                <option value="Admin">Admin</option>
            </select><br/>
            Wachtwoord:<br/>
            <input type="password" name="password" required="true"><br/>
            Herhaal wachtwoord:<br/>
            <input type="password" name="repeat_password" required="true"><br/>
            <input type="submit" value="Toevoegen">
        </form>
    </div>

</div>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
