{extends file='admin.tpl'}
{block name=productsforms}
    <div class="adminpart">
        <form action="handlers/UploadProductHandler.php" method="POST" enctype="multipart/form-data">
            <div>
                <h3>Product toevoegen</h3>
                <h4>Productinformatie</h4>
            </div>            
            <div>
                <label for="productname">Productnaam</label>
                <input type="text" name="productname" id="productname" required="true">
            </div>
            <div>
                <label for="productSummaryShort">Korte omschrijving</label>
                <textarea type="text" id="productSummaryShort" name="productSummaryShort"  maxlength="200" required="true"></textarea>
            </div>
            <div>
                <label for="productSummaryLong">Lange omschrijving</label>
                <textarea type="text" id="productSummaryLong" name="productSummaryLong" class="longdescription" required="true"></textarea>
            </div>
            <div>
                <label for="characteristics">Kenmerken</label>
                <input type="text" id="characteristics" name="characteristics" required="true" placeholder="Kenmerk, Kenmerk, Kenmerk">
            </div>
            <div>
                <label for="price">Prijs</label>
                <input type="number" id="price" name="price" min="0.01" step="0.01" value="0.01" />
            </div>
            <div>
                <label for="brand">Merk</label>
                <input type="text" id="brand" name="brand" required="true">
            </div>
            <div>
                <label for="amount">Aantal op voorraad</label>
                <input type="number" min="1" step="1" value="1" name="amount" required="true">
            </div>

            <div>
                <label for="categoriesAddProduct">Categorienaam</label>
                <select type="text" id="categoriesAddProduct" id="categoriesAddProduct" name="categoriesAddProduct">
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
            <div>
                <label for="image">Foto categorie</label>
                <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
            </div>

            <div><h4>Leverancier</h4></div>
            <div>
                <label for="suppliersAddProduct">Kies uw leverancier</label>
                <select type="text" id="suppliersAddProduct" name="suppliersAddProduct" onchange="grabInfo(this, 'getSupplierInfo', 'contentDivAddProduct')">
                    <option value="">Nieuwe leverancier</option>
                    {foreach from=$suppliers item=supplier }
                        <option id="{$supplier->name}" value="{$supplier->name}">{$supplier->name}</option>
                    {/foreach}
                </select>
            </div>

            <div id="contentDivAddProduct">
                <div>
                    <label for="suppliername">Naam</label>
                    <input type="text" id="suppliername" name="suppliername" required="true">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required="true">
                </div>
                <div>
                    <label for="telephonenumber">Telefoonnummer</label>
                    <input type="tel" id="telephonenumber" name="telephonenumber" required="true">
                </div>
                <div>
                    <label for="streetname">Adres</label>
                    <input type="text" name="streetname" required="true" placeholder="Straatnaam">
                </div>
                <div>
                    <label></label>
                    <input type="text" name="housenumber" required="true" placeholder="Huisnummer">
                </div>
                <div>
                    <label></label>
                    <input type="text" name="housenumberSuffix" placeholder="Huisnummertoevoeging">
                </div>
                <div>
                    <label for="postalCode">Postcode</label>
                    <input type="text" id="postalCode" name="postalCode" required="true">
                </div>
                <div>
                    <label for="city">Woonplaats</label>
                    <input type="text" id="city" name="city" required="true">
                </div>
            </div>
            <div>
                <label></label>
                <input type="submit" value="Toevoegen" id="addProduct" class="button"/>
            </div>
        </form>

        <form action="handlers/EditProductHandler.php" method="POST" enctype="multipart/form-data">
            {$cat = ""}
            <div>
                <h3>Product wijzigen</h3>
            </div>
            <div>
                <label for="categoriesEditProduct">Categorienaam</label>
                <select type="text" id="categoriesEditProduct" name="categoriesEditProduct" onchange="grabInfo(this, 'getProductsFromCategoryEditProduct', 'contentDivEditProduct1');">
                    {foreach from=$categories[0] item=parent }
                        {if $cat === ""}
                            {$cat = $parent}
                        {/if}
                        <option class="category" id="{$parent->id}">{$parent->name}</option>
                        {foreach from=$categories[1] item=child }
                            {if $child->parent === $parent->id}
                                <option class="subcategory" id="{$child->id}">{$child->name}</option>
                            {/if}
                        {/foreach}
                    {/foreach}
                </select>
            </div>

            <div id="contentDivEditProduct1">
                {$product = ""}
                <div><label for="productToEdit">Productnaam</label>
                    <select type="text" id="productToEdit" name="productToEdit" onchange="grabInfo(this, 'getProductAndSupplierInfoEditProduct', 'contentDivEditProduct2')">
                        {foreach from=$products item=productitem }
                            {if $productitem->categoryId === $cat->id}
                                {if $product === ""}
                                    {$product = $productitem}
                                {/if}
                                <option value="{$productitem->id}">{$productitem->name}</option>
                            {/if}
                        {/foreach}
                    </select></div>
                    
                <div id="contentDivEditProduct2">
                    <div><h4>Productinformatie</h4></div>
                    <div>
                        <label for="productname">Productnaam</label>
                        <input type="text" name="productnameEditProduct" id="productname" required="true" value="{$product->name}">
                    </div>
                    <div>
                        <label for="productSummaryShort">Korte omschrijving</label>
                        <textarea type="text" id="productSummaryShort" name="productSummaryShortEditProduct"  maxlength="200" required="true">{$product->shortDescription}</textarea>
                    </div>
                    <div>
                        <label for="productSummaryLong">Lange omschrijving</label>
                        <textarea type="text" id="productSummaryLong" name="productSummaryLongEditProduct" class="longdescription" required="true">{$product->description}</textarea>
                    </div>
                    <div>
                        <label for="characteristics">Kenmerken</label>
                        <input type="text" id="characteristics" name="characteristicsEditProduct" required="true" placeholder="Kenmerk, Kenmerk, Kenmerk" value="{$product->characteristics}">
                    </div>
                    <div>
                        <label for="price">Prijs</label>
                        <input type="number" id="price" name="priceEditProduct" min="0.01" step="0.01" value="{$product->price}"/>
                    </div>
                    <div>
                        <label for="brand">Merk</label>
                        <input type="text" id="brand" name="brandEditProduct" required="true" value="{$product->brand}">
                    </div>
                    <div>
                        <label for="amountEditProduct">Aantal op voorraad</label>
                        <input type="number" min="1" step="1" name="amountEditProduct" required="true" value="{$product->amount}">
                    </div>

                    <div>
                        <label for="categoriesEditProduct">Categorienaam</label>
                        <select type="text" id="categoriesAddProduct" id="categoriesAddProduct" name="categoriesAddProduct">
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
                    <div>
                        <label for="image">Foto categorie</label>
                        <input type="file" accept="image/*" name="image" id="image" class="input_text"/>
                    </div>
                    <div>
                        <img type="image" src="/Plug_IT/assets/pix/products/{$product->id}.png" class="image" />
                    </div>

                    <div><h4>Leverancier</h4></div>
                    {$supplier = ""}
                    <div>
                        <label for="suppliersEditProduct">Kies uw leverancier</label>
                        <select type="text" id="suppliersAddProduct" name="suppliersAddProduct" onchange="grabInfo(this, 'getSupplierInfo', 'contentDivEditProduct3')">
                            <option value="">Nieuwe leverancier</option>
                            {foreach from=$suppliers item=supplieritem }
                                {if $supplieritem->name === $product->supplier}
                                    {$supplier = $supplieritem}
                                    <option id="{$supplieritem->name}" value="{$supplieritem->name}" selected>{$supplieritem->name}</option>
                                {else}
                                    <option id="{$supplieritem->name}" value="{$supplieritem->name}">{$supplieritem->name}</option>
                                {/if}

                            {/foreach}
                        </select>
                    </div>

                    <div id="contentDivEditProduct3">

                        <div>
                            <label for="suppliername">Naam</label>
                            <input type="text" id="suppliername" name="suppliernameEditProduct" required="true" value="{$supplier->name}" readonly>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="emailEditProduct" required="true" value="{$supplier->email}" readonly>
                        </div>
                        <div>
                            <label for="telephonenumber">Telefoonnummer</label>
                            <input type="tel" id="telephonenumber" name="telephonenumberEditProduct" required="true" value="{$supplier->telephonenumber}" readonly>
                        </div>
                        <div>
                            <label for="streetname">Adres</label>
                            <input type="text" name="streetnameEditProduct" required="true" placeholder="Straatnaam" value="{$supplier->streetname}" readonly>
                        </div>
                        <div>
                            <label></label>
                            <input type="text" name="housenumberEditProduct" required="true" placeholder="Huisnummer" value="{$supplier->housenumber}" readonly>
                        </div>
                        <div>
                            <label></label>
                            <input type="text" name="housenumberSuffixEditProduct" placeholder="Huisnummertoevoeging" value="{$supplier->housenumber_suffix}" readonly>
                        </div>
                        <div>
                            <label for="postalCode">Postcode</label>
                            <input type="text" id="postalCode" name="postalCodeEditProduct" required="true" value="{$supplier->postalCode}" readonly>
                        </div>
                        <div>
                            <label for="city">Woonplaats</label>
                            <input type="text" id="city" name="cityEditProduct" required="true" value="{$supplier->city}" readonly>
                        </div>

                    </div>

                </div>
            </div>

            <div>
                <label></label>
                <input type="submit" value="Wijzigen" id="editCategory" class="button"/>
            </div>
        </form>





        <form method="POST" enctype="multipart/form-data" onsubmit="removeProduct(this, event);">
            {$cat = ""}
            <div>
                <h3>Product verwijderen</h3>
            </div>
            <div>
                <label for="categoriesRemoveProduct">Categorienaam</label>
                <select type="text" id="categories_remove" id="categoriesRemoveProduct" name="categoriesRemoveProduct" onchange="grabInfo(this, 'getProductsFromCategoryRemoveProduct', 'contentDivRemoveProduct')">
                    {foreach from=$categories[0] item=parent }
                        {if $cat === ""}
                            {$cat = $parent}
                        {/if}
                        <option class="category" id="{$parent->id}">{$parent->name}</option>
                        {foreach from=$categories[1] item=child }
                            {if $child->parent === $parent->id}
                                <option class="subcategory" id="{$child->id}">{$child->name}</option>
                            {/if}
                        {/foreach}
                    {/foreach}
                </select>
            </div>
            <div id="contentDivRemoveProduct">

                <div><label for="productToRemove">Productnaam</label>
                    <select type="text" id="productToRemove" name="productToRemove">
                        {foreach from=$products item=product }
                            {if $product->categoryId === $cat->id}
                                <option value="{$product->id}">{$product->name}</option>
                            {/if}
                        {/foreach}
                    </select></div>
            </div>

            <div>
                <label></label>
                <input type="submit" value="Verwijderen" id="removeCategory" class="button"/>
            </div>
        </form>






        {*<form action="handlers/UploadProductHandler.php" method="POST" enctype="multipart/form-data">
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
        <input type="number" name="price" min="0.01" step="0.01" value="0.01" />
        <label>Merk:</label>
        <input type="text" name="brand" required="true">
        <label>Aantal op voorraad:</label>
        <input type="number" name="amount" required="true">
        <label>Categorienaam:</label>
        <select id="categoriesAddProduct" name="categoriesAddProduct">
        {foreach from=$categories[0] item=parent }
        <option class="category" value="{$parent->id}">{$parent->name}</option>
        {foreach from=$categories[1] item=child }
        {if $child->parent === $parent->id}
        <option class="subcategory" value="{$child->id}">{$child->name}</option>
        {/if}
        {/foreach}
        {/foreach}
        </select>
        <label>Foto product:</label>
        <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
        
        <h5>Leverancier</h5>
        <label>Kies uw leverancier:</label>
        <select name="suppliersAddProduct" onchange="grabInfo(this, 'getSupplierInfo', 'contentDivAddProduct')">
        <option value="">Nieuwe leverancier</option>
        {foreach from=$suppliers item=supplier }
        <option id="{$supplier->name}" value="{$supplier->name}">{$supplier->name}</option>
        {/foreach}
        </select>
        
        <div id="contentDivAddProduct">
        <label>Naam:</label>
        <input type="text" name="suppliername" required="true">
        <label>Email:</label>
        <input type="email" name="email" required="true">
        <label>Telefoonnummer:</label>
        <input type="tel" name="telephonenumber" required="true">
        <label>Adres:</label>
        <input type="text" name="streetname" required="true" placeholder="Straatnaam">
        <input class="small_field" type="text" name="housenumber" required="true" placeholder="nr">
        <input class="small_field" type="text" name="housenumberSuffix" placeholder="tv">
        <label>Postcode:</label>
        <input type="text" name="postalCode" required="true">
        <label>Woonplaats:</label>
        <input type="text" name="city" required="true">
        </div>
        
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
        </form>*}
    </div>
{/block}