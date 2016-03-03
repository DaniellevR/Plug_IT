<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
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
                <?php
                $crumbs = explode("/", $_SERVER["REQUEST_URI"]);
                $lastElement = end($crumbs);
                $path = '';
                foreach ($crumbs as $crumb) {
                    if ($crumb === 'Plug_IT') {
                        $path = "Home";
                    } else if ($crumb !== 'index.php') {
                        $crumb = str_replace('.php', '', $crumb);
                        $path = $path . ' > ' . $crumb;
                    }
                }
                echo $path;
                ?>
            </div>

            <a href="index.php"> <img src="pix/logo.png" alt="Plug IT.nl" /></a>

            <div class="search">
                <form action="#" method="post">
                    <input id="searchBar" type="text" placeholder="Zoeken..." required/>
                    <input id="searchBarButton" type="button" value="Zoeken">
                </form>
            </div>

            <div class="cart">
                <a href="#">
                    <img id="shoppingCart" src="pix/winkelmandje.png" alt="Winkelmandje">
                </a>
            </div>
        </div>
    </body>
</html>