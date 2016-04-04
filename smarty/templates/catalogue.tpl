{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Catalogus</h1>

        {if isset($productsFound)}
            {if $productsFound|@sizeof > 0}
                {foreach from=$productsFound item=product}
                    <div class='productThumbnail'>
                        <div class='leftThumbnailPart'>                        
                            <img class='productImage' src='assets/pix/products/{$product->id}.png' alt='NO IMAGE' />
                        </div>
                        <div class='centerThumbnailPart'>

                            <div class='productName'>
                                <h4>{$product->name}</h4>
                            </div>
                            <div class='shortDescription'>
                                <p>{$product->shortDescription}</p></div>
                            <div id='productBuy'><p>€{$product->price}</p>
                            </div>
                        </div>
                        <div class='rightThumbnailPart'>
                            <div class="buy">
                                <form class="noadditionalDesign" action="/Plug_IT/index.php?page=Cart" method="post">
                                    <input class='cartAmount' name="amount" type="number" min="1" step="1" value="1" />
                                    <input name="page" value="Cart" hidden/>
                                    <input name="id" value="{$product->id}" hidden/>
                                    <input cass="CartButton" type="submit" value="Toevoegen aan winkelwagentje"/>
                                </form>
                            </div>
                            <a id='linkToProduct' href='/Plug_IT/index.php?page=Product&id={$product->id}'>
                                <p>Naar productpagina</p>
                            </a>
                        </div>
                    </div>
                {/foreach}
            {else}
                <h4>Geen producten gevonden</h4>
            {/if}
        {else if isset($childCategories)}
            {if $childCategories|@count > 0}
                <div class='catalogueHeader'><h3>Sub-Categoriën</h3></div>
                {foreach from=$childCategories item=cat}
                    <a href="/Plug_IT/index.php?page=Catalogue&cat={$cat->name}&id={$cat->id}">
                        <div class='categoryThumbnail'>
                            <img class='categoryImage' src='assets/pix/categories/{$cat->id}.png' alt='NO IMAGE' />
                            {$cat->name}
                        </div>
                    </a>
                {/foreach}
            {/if}
        {else if isset($allCategories)}
            {if $allCategories|@count > 0}
                <div class='catalogueHeader'><h3>Categoriën</h3></div>
                {foreach from=$allCategories item=cat}
                    {if $cat->parent == null}
                        <a href="/Plug_IT/index.php?page=Catalogue&cat={$cat->name}&id={$cat->id}">
                            <div class='categoryThumbnail'>
                                <img class='categoryImage' src='assets/pix/categories/{$cat->id}.png' alt='NO IMAGE' />
                                {$cat->name} 
                            </div>
                        </a>

                    {/if}
                {/foreach}
            {/if}
        {/if}

        {if isset($products)}
            {if $products|@count > 0}
                <div class='catalogueHeader'><h3>Producten</h3></div>
                {$i = 0}
                {foreach from=$products item=product}
                    <div class='productThumbnail'>
                        <div class='leftThumbnailPart'>                        
                            <img class='productImage' src='assets/pix/products/{$product->id}.png' alt='NO IMAGE' />
                        </div>
                        <div class='centerThumbnailPart'>

                            <div class='productName'>
                                <h4>{$product->name}</h4>
                            </div>
                            <div class='shortDescription'>
                                <p>{$product->shortDescription}</p></div>
                            <div id='productBuy'><p>€{$product->price}</p>
                            </div>
                        </div>
                        <div class='rightThumbnailPart'>
                            <div class="buy">
                                <form class="noadditionalDesign" action="/Plug_IT/index.php?page=Cart" method="post">
                                    <input class='cartAmount' name="amount" type="number" min="1" step="1" value="1" />
                                    <input name="page" value="Cart" hidden/>
                                    <input name="id" value="{$product->id}" hidden/>
                                    <input class="CartButton" type="submit" value="Toevoegen aan winkelwagentje"/>
                                </form>
                            </div>
                            <a id='linkToProduct' href='/Plug_IT/index.php?page=Product&id={$product->id}'>
                                <p>Naar productpagina</p>
                            </a>
                        </div>
                    </div>
                {/foreach}
            {/if}
        {/if}
    </div>
{/block}
