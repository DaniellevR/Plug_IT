{extends file='layout.tpl'}
{block name=body}

    <div class="content admin">
        <h1>Admin</h1>

        <ul class="adminpnl">
            <li class="menu_item" id="item1">Categorieën</li>
            <li class="menu_item" id="item2">Producten</li>
            <li class="menu_item" id="item3">Gebruikers</li>
            <li class="menu_item" id="item4">Orders</li>
        </ul>

        <div class="categories fullarticle" id="article1">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="line">
                    <label>Categorienaam:</label>
                    <div class="input">
                        <input type="text" name="categoryname" required="true">
                    </div>
                </div>
                <div class="line">
                    <label>Omschrijving:</label>
                    <div class="input">
                        <input type="text" name="category_description" required="true">
                    </div>
                </div>
                <div class="line">
                    <label>Ouder categorie:</label>
                    <div class="input">
                        <select name="formParentCategories">
                            <option value="">-</option>
                            {foreach from=$categories[0] item=parent }
                                <option>{$parent->name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="line">
                    <label>Foto categorie:</label>
                    <div class="input">
                        <input type="file" accept="image/*" name="image" id="image" required="true"/>
                    </div>
                </div>
                <button type="submit" value="Submit" class="form_button">Toevoegen</button>
            </form>

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="line">
                    <label>Categorienaam:</label>
                    <div class="input">
                        <select id="categories_edit" name="Categories">
                            {$i = 0}
                            {foreach from=$categories[0] item=parent }
                                <option class="category" id="opt{$i}">{$parent->name}</option>
                                {$j = 0}
                                {foreach from=$categories[1] item=child }
                                    {if $child->parent === $parent->id}
                                        <option class="subcategory" id="opt{$i};{$j++}">{$child->name}</option>
                                    {/if}
                                {/foreach}
                                {$i++}
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="line">
                    <label>Omschrijving:</label>
                    <div class="input">
                        <input id="desc" type="text" name="category_description" required="true">
                    </div>
                </div>
                <div class="line">
                    <label>Ouder categorie:</label>
                    <div class="input">
                        <select name="formParentCategories">
                            <option value="">-</option>
                            {foreach from=$categories[0] item=parent }
                                <option>{$parent->name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="line">
                    <label>Foto categorie:</label>
                    <div class="input">
                        <input type="file" accept="image/*" name="image" id="image" required="true"/>
                    </div>
                </div>
                <button type="submit" value="Submit" class="form_button">Toevoegen</button>
            </form>

            <form>
                <div class="line">
                    <label>Categorie:</label>
                    <div class="input">
                        <select id="categories_remove" name="Categories">
                            {foreach from=$categories[0] item=parent }
                                <option class="category">{$parent->name}</option>
                                {foreach from=$categories[1] item=child }
                                    {if $child->parent === $parent->id}
                                        <option class="subcategory">{$child->name}</option>
                                    {/if}
                                {/foreach}
                            {/foreach}
                        </select>
                    </div>
                </div>
                <button type="submit" value="Submit" class="form_button">Verwijderen</button>
            </form>
        </div>

        <div class="products fullarticle" id="article2">
            <ul class="admin_list">
            </ul>

            <form>
                <div class="line">
                    <label>Productnaam:</label>
                    <div class="input">
                        <input type="text" name="productnaam" required="true">
                    </div>
                </div>
                <div class="line">
                    <label>Omschrijving:</label>
                    <div class="input">
                        <input type="text" name="product_omschrijving" required="true">
                    </div>
                </div>
                <div class="line">
                    <label>Prijs:</label>
                    <div class="input">
                        <input type="number" min="0.01" step="0.01" value="0.01" />
                    </div>
                </div>
                <!--<span class="currencyinput">â‚¬<input type="number" min="0.01" step="0.01" value="0.01" name="price"></span><br/>-->
                <div class="line">
                    <label>Foto product:</label>
                    <div class="input">
                        <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
                    </div>
                </div>
                <button type="submit" value="Submit" class="form_button">Toevoegen</button>
            </form>

            <form>
                <div class="line">
                    <label>Categorienaam:</label>
                    <div class="input">
                        <select name="Categories">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
                <button type="submit" value="Submit" class="form_button">Verwijderen</button>
            </form>
        </div>

        <div class="users fullarticle" id="article3">
            <form>
                <div class="line">
                    <label>Gebruikersnaam:</label>
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
                        <input type="password" name="repeat_password" required="true"><br/>
                    </div>
                </div>
                <button type="submit" value="Submit" class="form_button">Toevoegen</button>
            </form>
        </div>

        <div class="orders fullarticle" id="article4">
            <form>
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

    </div>
{/block}