<?php
/* Smarty version 3.1.29, created on 2016-03-21 14:47:11
  from "C:\wamp\www\Plug_IT\Application\views\templates\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56effb5f953eb5_20235892',
  'file_dependency' => 
  array (
    '6e3b8e0b4097a1bedf687cd96142fb8c481e9df4' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\Application\\views\\templates\\admin.tpl',
      1 => 1458501291,
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
function content_56effb5f953eb5_20235892 ($_smarty_tpl) {
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
    var index = 0;

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

        $(function() {
            $("#categories").change(function(e) {

                index = $("#categories option:selected").index();

                $("#subcategories").show();
            });
        });
    });
<?php echo '</script'; ?>
>

<div class="content admin">
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
        <form action="<?php echo base_url('index.php/AdminController/addCategory');?>
" method="POST" enctype="multipart/form-data">
            <div class="line">
                <label>Categorienaam:</label>
                <div class="input">
                    <input type="text" name="categoryname" required="true">
                </div>
            </div>
            <div class="line">
                <label>Omschrijving:</label>
                <div class="input">
                    <input type="text" name="category_description" required="true">
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

        <form>
            <div class="line">
                <label>Categorie:</label>
                <div class="input">
                    <select id="categories" name="Categories">
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
                            <option><?php echo $_smarty_tpl->tpl_vars['parent']->value->name;?>
</option>
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
                <label>Subcategorie:</label>
                <div class="input">
                    <select id="subcategories" name="subcategories">
                    </select>
                </div>
            </div>
            <button type="submit" value="Submit" class="form_button">Verwijderen</button>
        </form>
    </div>

    <div class="products fullarticle" id="article2">
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
            <!--<span class="currencyinput">€<input type="number" min="0.01" step="0.01" value="0.01" name="price"></span><br/>-->
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

    <div class="users fullarticle" id="article3">
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

    <div class="orders fullarticle" id="article4">
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
</div>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
