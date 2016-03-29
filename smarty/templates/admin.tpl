{extends file='layout.tpl'}
{block name=body}
    <script type="text/javascript" src="/Plug_IT/assets/js/adminPanelNavigation.js"></script>
    <div class="content admin">
        <h1 class="test">Admin</h1>

        {if isset($smarty.cookies.PHPSESSID)}
            {*            { && $smarty.session.usertype === "Admin"}*}
            <ul class="adminpnl" id="parts">
                <li><a href="#part1">Categorieën</a></li>
                <li><a href="#part2">Producten</a></li>
                <li><a href="#part3">Gebruikers</a></li>
                <li><a href="#part4">Orders</a></li>
            </ul>

            <div class="categories adminpart" id="part1">
                <form action="handlers/UploadCategoryHandler.php" method="POST" enctype="multipart/form-data">
                    <h3>Categorie toevoegen</h3>
                    <label>Categorienaam:</label>
                    <input type="text" name="categoryname" required="true">
                    <label>Omschrijving:</label>
                    <input type="text" name="category_description" required="true">
                    <label>Ouder categorie:</label>
                    <select id="categoriesAdd" name="parent">
                        <option value="">-</option>
                        {foreach from=$categories[0] item=parent }
                            <option value="{$parent->id}">{$parent->name}</option>
                        {/foreach}
                    </select>
                    <label>Foto categorie:</label>
                    <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>

                <form action="handlers/EditCategoryHandler.php" method="POST" enctype="multipart/form-data">
                    <h3>Categorie wijzigen</h3>
                    <div class="line">
                        <label>Categorienaam:</label>
                        <div class="input">
                            <select id="categories_edit" name="categoriesEdit" onchange="grabInfo(this, 'editCategory', 'contentDivEditCategory')">
                                {$i = 0}
                                {foreach from=$categories[0] item=parent }
                                    <option class="category" value="{$parent->id}" id="{$parent->id}">{$parent->name}</option>
                                    {$j = 0}
                                    {foreach from=$categories[1] item=child }
                                        {if $child->parent === $parent->id}
                                            <option class="subcategory" value="{$child->id}" id="{$child->id}">{$child->name}</option>
                                        {/if}
                                    {/foreach}
                                    {$i++}
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div id="contentDivEditCategory"></div>
                    <button type="submit" value="Submit" class="form_button">Wijzigen</button>
                </form>

                <form method="POST" enctype="multipart/form-data" onsubmit="removeCategory(this, event)">
                    <h3>Categorie verwijderen</h3>
                    <div class="line">
                        <label>Categorienaam:</label>
                        <div class="input">
                            <select id="categories_remove" name="categoriesRemove">
                                {foreach from=$categories[0] item=parent }
                                    <option class="category" value="{$parent->id}">{$parent->name}</option>
                                    {foreach from=$categories[1] item=child }
                                        {if $child->parent === $parent->id}
                                            <option class="subcategory" value="{$child->id}">{$child->name}</option>
                                        {/if}
                                    {/foreach}
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Verwijderen</button>
                </form>
            </div>

            {*                            {Products}*}

            <div class="products adminpart" id="part2">
                <form>
                    <h3>Product toevoegen</h3>
                    <h5>Productinformatie</h5>
                    <label>Productnaam:</label>
                    <input type="text" name="productname" required="true">
                    <label>Korte omschrijving:</label>
                    <textarea name="productSummaryShort"  maxlength="200" required="true"></textarea>
                    <label>Lange omschrijving:</label>
                    <textarea name="productSummaryLong" class="longdescription" required="true"></textarea>
                    <label>Kenmerken:</label>
                    <input type="text" name="characteristics" required="true" placeholder="Kenmerk, Kenmerk, Kenmerk">
                    <label>Prijs:</label>
                    <input type="number" min="0.01" step="0.01" value="0.01" />
                    <label>Merk:</label>
                    <input type="text" name="brand" required="true">
                    <label>Foto product:</label>
                    <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
                    <label>Categorienaam:</label>
                    <select id="categoriesAddProduct" name="categoriesAddProduct">
                        {foreach from=$categories[0] item=parent }
                            <option class="category">{$parent->name}</option>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent === $parent->id}
                                    <option class="subcategory">{$child->name}</option>
                                {/if}
                            {/foreach}
                        {/foreach}
                    </select>
                    
                    <h5>Leverancier</h5>
                    <label>Bestaande leverancier:</label>
                    <select name="suppliersAddProduct">
                        <option value="">-</option>
                        {foreach from=$suppliers item=supplier }
                            <option value="{$supplier->name}">{$supplier->name}</option>
                        {/foreach}
                    </select>
                    
                    <label>Naam:</label>
                    <input type="text" name="suppliername" required="true">
                    <label>Adres:</label>
                    <input type="text" name="streetname" required="true" placeholder="Straatnaam">
                    <input class="small_field" type="text" name="housenumber" required="true" placeholder="nr">
                    <input class="small_field" type="text" name="housenumberSuffix" required="true" placeholder="tv">
                    <label>Postcode:</label>
                    <input type="text" name="postalCode" required="true">
                    <label>Woonplaats:</label>
                    <input type="text" name="city" required="true">
                    
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>

                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>Product wijzigen</h3>
                    <label>Categorienaam:</label>
                    <select id="categories_remove" name="categoriesAddProduct" onchange="grabInfo(this, 'getProductsFromCategoryEditProduct', 'contentDivEditProductPart1')">
                        {foreach from=$categories[0] item=parent }
                            <option class="category" id="{$parent->id}">{$parent->name}</option>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent === $parent->id}
                                    <option class="subcategory" id="{$child->id}">{$child->name}</option>
                                {/if}
                            {/foreach}
                        {/foreach}
                    </select>
                    <div id="contentDivEditProductPart1"></div>
                    <div id="contentDivEditProductPart2"></div>
                    <button type="submit" value="Submit" class="form_button">Wijzigen</button>
                </form>

                <form method="POST" enctype="multipart/form-data" onsubmit="">
                    <h3>Product verwijderen</h3>
                    <label>Categorie:</label>
                    <select id="categories_remove" name="categoriesAddProduct" onchange="grabInfo(this, 'getProductsFromCategoryRemoveProduct', 'contentDivRemoveProduct')">
                        {foreach from=$categories[0] item=parent }
                            <option class="category" id="{$parent->id}">{$parent->name}</option>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent === $parent->id}
                                    <option class="subcategory" id="{$child->id}">{$child->name}</option>
                                {/if}
                            {/foreach}
                        {/foreach}
                    </select>
                    <div id="contentDivRemoveProduct"></div>
                    <button type="submit" value="Submit" class="form_button">Verwijderen</button>
                </form>
            </div>

            {*                            {GEBRUIKERS}*}

            <div class="users adminpart" id="part3">
                <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
                    <h3>Gebruiker toevoegen</h3>
                    <h5>Persoonsgegevens</h5>
                    <label>Naam:</label>
                    <input type="text" name="firstname" required="true" placeholder="Voornaam">
                    <input type="text" name="prefix" required="true" placeholder="tv">
                    <input type="text" name="lastname" required="true" placeholder="Achternaam">
                    <label>Email:</label>
                    <input type="text" name="email" required="true">
                    <label>Telefoonnummer:</label>
                    <input type="text" name="telephonenumber" required="true">
                    <h5>Adresgegevens</h5>
                    <label>Adres:</label>
                    <input type="text" name="streetnameAddUser" required="true" placeholder="Straatnaam">
                    <input type="text" name="housenumberAddUser" required="true" placeholder="nr">
                    <input type="text" name="housenumberSuffixAddUser" required="true" placeholder="tv">
                    <label>Postcode:</label>
                    <input type="text" name="postalCodeAddUser" required="true">
                    <label>Woonplaats:</label>
                    <input type="text" name="cityAddUser" required="true">
                    <h5>Accountgegevens</h5>
                    <label>Gebruikersnaam:</label><input type="text" name="username" required="true">
                    <label>Rol:</label><select name="roles"><option value="User">Gebruiker</option><option value="Admin">Admin</option></select>
                    <label>Wachtwoord:</label><input type="password" name="password" required="true">
                    <label>Herhaal wachtwoord:</label><input type="password" name="repeat_password" required="true"><br/>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>
            </div>

            {*                            {ORDERS}*}

            <div class="orders adminpart" id="part4">
                <form>
                    <h3>Order toevoegen</h3>
                    <div class="line">
                        <label>Ordernaam:</label>
                        <div class="input">
                            <input type="text" name="username" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Type:</label>
                        <div class="input">
                            <select name="types">
                                <option value="User">Gebruiker</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="line">
                        <label>Wachtwoord:</label>
                        <div class="input">
                            <input type="password" name="password" required="true">
                        </div>
                    </div>
                    <div class="line">
                        <label>Herhaal wachtwoord:</label>
                        <div class="input">
                            <input type="password" name="repeat_password" required="true">
                        </div>
                    </div>
                    <button type="submit" value="Submit" class="form_button">Toevoegen</button>
                </form>
            </div>
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
