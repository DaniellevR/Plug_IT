<?php
/* Smarty version 3.1.29, created on 2016-03-09 01:33:09
  from "C:\wamp\www\Webs_Plug_IT\Application\views\templates\footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56df6f459eff42_99377018',
  'file_dependency' => 
  array (
    'aa5b9ef72578802fbba363078f8d0f862f6fc1cf' => 
    array (
      0 => 'C:\\wamp\\www\\Webs_Plug_IT\\Application\\views\\templates\\footer.tpl',
      1 => 1457483553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56df6f459eff42_99377018 ($_smarty_tpl) {
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
