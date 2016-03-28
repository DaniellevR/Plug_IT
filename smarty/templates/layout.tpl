<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
    <head> 
        <title>{block name=title}Plug IT{/block}</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="/Plug_IT/assets/css/style.css" />
    {block name=head}{/block}
</head>
<body>
    <div class="sitecontainer">
        <div class="header">
            <div class="logintool">
                <ul>
                    {foreach from=$navigation[0] item=nav }
                        <li><a href="/Plug_IT/index.php?page={$nav->page}">{$nav->name}</a></li>
                        {/foreach}
                </ul>
            </div>

            <div class="path">
                <a>Path</a>
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
        </ul>
    </div>
</div>
</body>
</html>
