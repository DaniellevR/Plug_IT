{extends file='layout.tpl'}
{block name=body}
    <div class="content admin">
        <h1 class="test">Admin</h1>
        
        {if $errors !== "" && $errors !== "Gebruikersnaam en/of wachtwoord is onjuist." && $errors !== "Er is iets misgegaan bij het inloggen. Probeer het opnieuw."}
            <div class="error">
                {$errors}
            </div>
        {/if}

        {if isset($smarty.cookies.PHPSESSID) && isset($smarty.session.usertype) && $smarty.session.usertype === "Administrator"}
            <ul class="adminpnl">
                {if $smarty.get.page === 'AdminCategories'}
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminCategories">Categorieën</a></li>
                    {else}
                    <li><a href="/Plug_IT/index.php?page=AdminCategories">Categorieën</a></li>
                    {/if}
                    {if $smarty.get.page === 'AdminProducts'}
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminProducts">Producten</a></li>
                    {else}
                    <li><a href="/Plug_IT/index.php?page=AdminProducts">Producten</a></li>
                    {/if}
                    {if $smarty.get.page === 'AdminUsers'}
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminUsers">Gebruikers</a></li>
                    {else}
                    <li><a href="/Plug_IT/index.php?page=AdminUsers">Gebruikers</a></li>
                    {/if}
                    {if $smarty.get.page === 'AdminOrders'}
                    <li class="selected"><a href="/Plug_IT/index.php?page=AdminOrders">Orders</a></li>
                    {else}
                    <li><a href="/Plug_IT/index.php?page=AdminOrders">Orders</a></li>
                    {/if}
            </ul>

        {block name=categoriesforms}{/block}

    {block name=productsforms}{/block}

{block name=usersforms}{/block}

{block name=ordersforms}{/block}

{else}
{block name="parent_block"}{include file="loginform.tpl"}{/block}

{/if}
</div>
{/block}