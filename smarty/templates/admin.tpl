{extends file='layout.tpl'}
{block name=body}
    <div class="content admin">
        <h1 class="test">Admin</h1>

        {if isset($smarty.cookies.PHPSESSID)}
            {*            { && $smarty.session.usertype === "Admin"}*}
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
{/if}
</div>
{/block}
