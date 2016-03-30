{extends file='admin.tpl'}
{block name=productsforms}
    {*    <div class="products adminpart" id="part2">*}
    <div class="adminpart">
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
{/block}