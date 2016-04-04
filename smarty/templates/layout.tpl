<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
    <head> 
        <title>{block name=title}Plug IT{/block}</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="/Plug_IT/assets/css/style.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="/Plug_IT/assets/js/functionCalls.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    {block name=head}{/block}
</head>
<body>
    <div class="sitecontainer">
        <div class="header">
            <div class="logintool">
                <ul>
                    {foreach from=$navigation[0] item=nav }
                        {if $nav->name === "Inloggen"}
                            {if !isset($smarty.session.usertype)}
                                <li><a href="/Plug_IT/index.php?page={$nav->page}">{$nav->name}</a></li>
                                {/if}
                            {elseif $nav->name === "Mijn account"}
                                {if isset($smarty.session.usertype)}
                                <li><a href="/Plug_IT/index.php?page={$nav->page}">{$smarty.session.username}</a></li>
                                {/if}
                            {elseif $nav->name === "Uitloggen"}
                                {if isset($smarty.session.usertype)}
                                <li><a onclick="logout(this, event);" href="">{$nav->name}</a></li>
                                {/if}
                            {else}
                            <li><a href="/Plug_IT/index.php?page={$nav->page}">{$nav->name}</a></li>
                            {/if}
                        {/foreach}
                </ul>
            </div>

            <div class="path">
                {if isset($smarty.get.page)}
                    {if $smarty.get.page === "Home"}
                        <a href='/Plug_IT/index.php?page=Home'>Home</a>
                    {elseif $smarty.get.page === "Register"}
                        <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page=Register'>Registreren</a>
                    {elseif $smarty.get.page === "Cart"}
                        <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page=Cart'>Winkelwagentje</a>
                    {elseif $smarty.get.page === "OrderAndDelivery"}
                        <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page=Cart'>Winkelwagentje</a> > <a href='/Plug_IT/index.php?page=OrderAndDelivery'>Order en levering</a>
                    {elseif $smarty.get.page === "Admin" || $smarty.get.page === "AdminCategories" || $smarty.get.page === "AdminProducts" || $smarty.get.page === "AdminUsers" || $smarty.get.page === "AdminOrders"}
                        <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page={$smarty.get.page}'>Admin</a>
                    {elseif $smarty.get.page === "Catalogue"}
                        <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page=Catalogue'>Catalogus</a>
                        {if isset($smarty.get.id)}
                            {foreach from=$categories[0] item=parent }
                                {if $smarty.get.id === $parent->id}
                                    > <a href='/Plug_IT/index.php?page=Catalogue&cat={$parent->name}&id={$parent->id}'>{$parent->name}</a>
                                {/if}
                            {/foreach}
                            {foreach from=$categories[1] item=child }
                                {if $smarty.get.id === $child->id}

                                    {foreach from=$categories[0] item=parent }
                                        {if $parent->id === $child->parent}
                                            > <a href='/Plug_IT/index.php?page=Catalogue&cat={$parent->name}&id={$parent->id}'>{$parent->name}</a>
                                        {/if}
                                    {/foreach}
                                    > <a href='/Plug_IT/index.php?page=Catalogue&cat={$child->name}&id={$child->id}'>{$child->name}</a>
                                {/if}
                            {/foreach}
                        {/if}
                    {elseif $smarty.get.page === "Product"}
                        <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page=Catalogue'>Catalogus</a>
                        {if isset($smarty.get.id)}
                            {$isFound = ""}
                            {foreach from=$categories[0] item=parent }
                                {if $product->categoryId === $parent->id}
                                    {$isFound = "yes"}
                                    > <a href='/Plug_IT/index.php?page=Catalogue&cat={$parent->name}&id={$parent->id}'>{$parent->name}</a>
                                {/if}
                            {/foreach}

                            {if $isFound === ""}
                                {foreach from=$categories[1] item=child }
                                    {if $product->categoryId === $child->id}
                                        {foreach from=$categories[0] item=parent }
                                            {if $parent->id === $child->parent}
                                                > <a href='/Plug_IT/index.php?page=Catalogue&cat={$parent->name}&id={$parent->id}'>{$parent->name}</a>
                                            {/if}
                                        {/foreach}
                                        > <a href='/Plug_IT/index.php?page=Catalogue&cat={$child->name}&id={$child->id}'>{$child->name}</a>
                                    {/if}
                                {/foreach}
                            {/if}
                            > <a href='/Plug_IT/index.php?page=Product&id={$product->id}'>{$product->name}</a>
                        {/if}
                    {else}
                        {foreach from=$navigation[0] item=headeritem }
                            {if $headeritem->page === $smarty.get.page}
                                <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page={$smarty.get.page}'>{$headeritem->name}</a>
                            {/if}
                        {/foreach}
                        {foreach from=$navigation[1] item=footeritem }
                            {if $footeritem->page === $smarty.get.page}
                                {if $footeritem->parent !== NULL}
                                    {foreach from=$navigation[1] item=footeritem2 }
                                        {if $footeritem->parent === $footeritem2->id}
                                            <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page={$footeritem2->page}'>{$footeritem2->name}</a> > <a href='/Plug_IT/index.php?page={$smarty.get.page}'>{$footeritem->name}</a>
                                        {/if}
                                    {/foreach}
                                {else}
                                    <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page={$smarty.get.page}'>{$footeritem->name}</a>
                                {/if}

                            {/if}
                        {/foreach}
                    {/if}
                {/if}

{*                <h1 class="testfunction">Testfunctie</h1>*}
            </div>

            <a href="/Plug_IT/index.php?page=Home"> <img src="/Plug_IT/assets/pix/logo.png" alt="Plug IT.nl" /></a>

            <div class="search">
                <form action="/Plug_IT/index.php?page=Catalogue" method="get">
                    <input id="searchBar" type="text" name="searchKeywords" placeholder="Zoeken..." required/>
                    <input name="page" value="Catalogue" hidden/>
                    <input id="searchBarButton" type="submit" value="Zoeken"/>
                </form>
            </div>

            <div class="cart">
                <a href="/Plug_IT/index.php?page=Cart">
                    <img id="shoppingCart" src="/Plug_IT/assets/pix/cart.png" alt="Winkelmandje">
                </a>
            </div>
        </div>
        <div class="content_container">
            <div class="navigation">
                <ul class="nav">
                    <a href="/Plug_IT/index.php?page=Catalogue">Catalogus</a>
                    {foreach from=$categories[0] item=parent }
                        <a href="/Plug_IT/index.php?page=Catalogue&cat={$parent->name}&id={$parent->id}"><li>{$parent->name}</li></a>
                        <ul>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent == $parent->id}
                                    <a href="/Plug_IT/index.php?page=Catalogue&cat={$child->name}&id={$child->id}"><li>{$child->name}</li></a>
                                        {/if}
                                    {/foreach}
                        </ul>
                    {/foreach}
                </ul>
            </div>
        {block name=body}{/block}
    </div>
    <div class="footer">
        {foreach from=$navigation[1] item=footeritem }
            {$children = ""}
            {foreach from=$navigation[1] item=footeritem2 }
                {if $footeritem2->parent === $footeritem->id}
                    {$children = "yes"}
                {/if}
            {/foreach}


            {if $children !== ""}
                <ul><b>{$footeritem->name}</b>
                    {foreach from=$navigation[1] item=footeritem2 }
                        {if $footeritem2->parent === $footeritem->id}
                            <li><a href="/Plug_IT/index.php?page={$footeritem2->page}">{$footeritem2->name}</a></li>
                            {/if}
                        {/foreach}
                </ul>
            {else}
                {if $footeritem->parent === NULL}
                    <ul><b><a href="/Plug_IT/index.php?page={$footeritem->page}">{$footeritem->name}</a></b><ul>
                        {/if}
                    {/if}
                {/foreach}
                </div>
                </div>
                </body>
                </html>
