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
                    {else}
                        {foreach from=$navigation[0] item=headeritem }
                            {if $headeritem->page === $smarty.get.page}
                                <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page={$smarty.get.page}'>{$headeritem->name}</a>
                            {/if}
                        {/foreach}
                        {foreach from=$navigation[1] item=footeritem }
                            {if $footeritem->page === $smarty.get.page}
                                <a href='/Plug_IT/index.php?page=Home'>Home</a> > <a href='/Plug_IT/index.php?page={$smarty.get.page}'>{$footeritem->name}</a>
                            {/if}
                        {/foreach}
                    {/if}
                {/if}
            </div>

            <a href="/Plug_IT/index.php?page=Home"> <img src="/Plug_IT/assets/pix/logo.png" alt="Plug IT.nl" /></a>

            <div class="search">
                <form action="#" method="post">
                    <input id="searchBar" type="text" placeholder="Zoeken..." required/>
                    <input id="searchBarButton" type="button" value="Zoeken">
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
                        <a href="/Plug_IT/index.php?page=Category"><li>{$parent->name}</li></a>
                        <ul>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent == $parent->id}
                                    <a href="/Plug_IT/index.php?page=Category"><li>{$child->name}</li></a>
                                        {/if}
                                    {/foreach}
                        </ul>
                    {/foreach}
                </ul>
            </div>
        {block name=body}{/block}
    </div>
    <div class="footer">
        <ul class="footer_nav">
            {foreach from=$navigation[1] item=nav }
                <li><a href="/Plug_IT/index.php?page={$nav->page}">{$nav->name}</a></li>
                {/foreach}
            <li><a href="/Plug_IT/index.php?page=Tasks">Taakverdeling</a></li>
        </ul>
    </div>
</div>
</body>
</html>
