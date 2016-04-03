{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Catalogus</h1>

        {if isset($productsFound)}
            {if $productsFound|@sizeof > 0}
                {foreach from=$productsFound item=product}
                    <div class='productThumbnail'>
                        <a href='/Plug_IT/index.php?page=Product&id={$product->id}'>
                            Naar productpagina
                        </a>
                        <img class='productImage' src='assets/pix/products/{$product->id}.png' alt='NO IMAGE' />
                        <div class='productName'>
                            <h4>{$product->name}</h4>
                        </div>
                        <div class='shortDescription'>
                            <p>{$product->shortDescription}</p></div>
                        <div id='productBuy'>
                            <p>€{$product->price}</p>
                        </div>
                        <div class="input">
                            <form action="/Plug_IT/index.php?page=Cart" method="post">
                                <input name="amount" type="number" min="1" step="1" value="1" />
                                <input name="page" value="Cart" hidden/>
                                <input name="id" value="{$product->id}" hidden/>
                                <input id="addToCartButton" type="submit" value="Toevoegen aan winkelwagentje"/>
                            </form>
                        </div>
                    </div>
                {/foreach}
            {else}
                <h4>Geen producten gevonden</h4>
            {/if}
        {else if isset($childCategories)}
            <div class='catalogueHeader'><h3>Categoriën</h3></div>
            {foreach from=$childCategories item=cat}
                <a href="/Plug_IT/index.php?page=Catalogue&cat={$cat->name}&id={$cat->id}">
                    <div class='categoryThumbnail'>
                        <img class='categoryImage' src='assets/pix/categories/{$cat->id}.png' alt='NO IMAGE' />
                        {$cat->name} 
                    </div>
                </a>
            {/foreach}
        {else if isset($allCategories)}
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

        {if isset($products)}
            <div class='catalogueHeader'><h3>Producten</h3></div>
            {foreach from=$products item=product}
                <div class='productThumbnail'>
                    <a href='/Plug_IT/index.php?page=Product&id={$product->id}'>
                        Naar productpagina
                    </a>
                    <img class='productImage' src='assets/pix/products/{$product->id}.png' alt='NO IMAGE' />
                    <div class='productName'>
                        <h4>{$product->name}</h4>
                    </div>
                    <div class='shortDescription'>
                        <p>{$product->shortDescription}</p></div>
                    <div id='productBuy'><p>€{$product->price}</p>
                    </div>
                    <div class="input">
                        <form class="noadditionalDesign" action="/Plug_IT/index.php?page=Cart" method="post">
                            <input name="amount" type="number" min="1" step="1" value="1" />
                            <input name="page" value="Cart" hidden/>
                            <input name="id" value="{$product->id}" hidden/>
                            <input id="addToCartButton" type="submit" value="Toevoegen aan winkelwagentje"/>
                        </form>
                    </div>
                </div>
            {/foreach}
        {/if}
    </div>
{/block}
