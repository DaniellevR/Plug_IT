<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 

    <head> 
        <title>Plug IT</title> 
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="{$style}" />
    </head>
    <body>
        <div class="sitecontainer">
            <div class="header">
                <div class="logintool">
                    <ul>
                        <li><a href="#">Gebruikersnaam</a></li>
                        <li><a href="#">Verlanglijst</a></li>
                        <li><a href="#">Klantenservice</a></li>
                        <li><a href="#">Uitloggen</a></li>
                    </ul>
                </div>

                <div class="path">
                    {*                    <table cellpadding="2" border="1">
                    <tr><th>ISBN</th><th>TITEL</th></tr>
                    {foreach from=$books item=book}
                    <tr><td>{$book.isbn}</td>
                    <td>{$book.title}</td></tr>
                    {/foreach}
                    </table>*}
                </div>

                <a href="{$home}"> <img src="{$logo}" alt="Plug IT.nl" /></a>

                <div class="search">
                    <form action="#" method="post">
                        <input id="searchBar" type="text" placeholder="Zoeken..." required/>
                        <input id="searchBarButton" type="button" value="Zoeken">
                    </form>
                </div>

                <div class="cart">
                    <a href="#">
                        <img id="shoppingCart" src="{$cart}" alt="Winkelmandje">
                    </a>
                </div>
            </div>