<?php
/* Smarty version 3.1.29, created on 2016-03-14 20:09:17
  from "C:\wamp\www\Webs_Plug_IT_3\Application\views\templates\footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e70c5dc21b38_80525317',
  'file_dependency' => 
  array (
    'f1ccae71b4ca77b2024a0cffe3bb8da98d7fe8b9' => 
    array (
      0 => 'C:\\wamp\\www\\Webs_Plug_IT_3\\Application\\views\\templates\\footer.tpl',
      1 => 1457980969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e70c5dc21b38_80525317 ($_smarty_tpl) {
?>
<div class="footer">
    <ul class="footer_nav">
        <li>
            <ul class="list">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['information']->value;?>
"><b>Informatie</b></a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['orderAndDeliviry']->value;?>
">Bestelling & levering</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['paymentInfo']->value;?>
">Betalen</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['retourInfo']->value;?>
">Retourneren</a></li>
            </ul>
        </li>
        <li>
            <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conditions']->value;?>
"><b>Voorwaarden</b></a></li>
            </ul>
        </li>
        <li>
            <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['contact']->value;?>
"><b>Contact</b></a></li>
            </ul>
        </li>
        <li>
            <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['about']->value;?>
"><b>Over</b></a></li>
            </ul>
        </li>
        <a class="admin_link" href="<?php echo $_smarty_tpl->tpl_vars['admin']->value;?>
"><b>Admin</b></a>
    </ul>
</div>
</div>
</body>
</html>
<?php }
}
