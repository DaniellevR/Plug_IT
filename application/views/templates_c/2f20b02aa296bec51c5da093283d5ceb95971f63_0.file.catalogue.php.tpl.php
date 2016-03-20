<?php
/* Smarty version 3.1.29, created on 2016-03-20 04:33:50
  from "C:\xampp\htdocs\Plug_IT\Application\views\templates\catalogue.php.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56ee1a1e6298f1_96094631',
  'file_dependency' => 
  array (
    '2f20b02aa296bec51c5da093283d5ceb95971f63' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Plug_IT\\Application\\views\\templates\\catalogue.php.tpl',
      1 => 1458439918,
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
function content_56ee1a1e6298f1_96094631 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="content">
    <div class="content">
        <?php echo '<?php
        ';?>include "database.php";

        $db = new Database;
        $categories = $db->getCategories();

        $category_list = array();

        foreach ($categories as $cat) {
        if ($cat->parent === null) {
        echo "<a href='catalogue.php'><div class='categoryThumbnail'>"
        . "<img class='categoryImage' src='pix/category" . $cat->id . ".jpg' alt='TODO' />"
        . $cat->name . "</div></a>";
        }
        }
        <?php echo '?>';?>
    </div>

    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
