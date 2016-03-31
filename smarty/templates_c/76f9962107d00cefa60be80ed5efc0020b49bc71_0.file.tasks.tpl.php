<?php
/* Smarty version 3.1.29, created on 2016-03-31 11:58:35
  from "C:\wamp\www\Plug_IT\smarty\templates\tasks.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fcf4cb3fe797_33457139',
  'file_dependency' => 
  array (
    '76f9962107d00cefa60be80ed5efc0020b49bc71' => 
    array (
      0 => 'C:\\wamp\\www\\Plug_IT\\smarty\\templates\\tasks.tpl',
      1 => 1459418251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_56fcf4cb3fe797_33457139 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_475456fcf4cb3e4bd4_72870044',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'}  file:tasks.tpl */
function block_475456fcf4cb3e4bd4_72870044($_smarty_tpl, $_blockParentStack) {
?>

    <div class="content">
        <h1>Taakverdeling</h1>
        <h2>Samen</h2>
        <ul>
            <li>EER opgesteld</li>
            <li>Schets homepage</li>
        </ul>
        <h2>Nigel</h2>
        <ul>
            <li>Basis HTML en CSS</li>
            <li>Home aanbiedingen</li>
            <li>Cataloguspagina</li>
            <li>Categorieënpagina</li>
            <li>Productpagina met reviews</li>
            <li>Bestellingsproces</li>
            <li>Betalingsproces</li>
            <li>Invullen database met data</li>
            <li>Inloggen</li>
            <li>Uitloggen</li>
        </ul>
        <h2>Daniëlle</h2>
        <ul>
            <li>Schetsen van de webshop</li>
            <li>HTML en CSS verbeterd, zodat de indelingen kloppen en responsive is.</li>
            <li>Navigatie header, footer en zijnavigatie</li>
            <li>
                <ul>Administratiepagina
                    <li>Categorieën toevoegen</li>
                    <li>Categorieën wijzigen</li>
                    <li>Categorieën verwijderen</li>
                    <li>Producten toevoegen</li>
                    <li>Producten wijzigen</li>
                    <li>Producten verwijderen</li>
                    <li>Gebruikers toevoegen</li>
                    <li>Gebruikers wijzigen</li>
                    <li>Orders toevoegen</li>
                    <li>Orders wijzigen</li>
                </ul>
            </li>
            <li>Pagina's voorzien van lorum ipsum</li>
            <li>Breadcrumbs?</li>
            <li>Registratiepagina</li>
            <li>Profielpagina</li>
        </ul>
    </div>
<?php
}
/* {/block 'body'} */
}
