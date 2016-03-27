{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Catalogus</h1>

        {if isset($childCategories)}
            {foreach from=$childCategories item=cat}
                <a href="/Plug_IT/index.php?page=Catalogue&cat={$cat->name}&id={$cat->id}">
                    <div class='categoryThumbnail'>
                        <img class='categoryImage' src='assets/pix/category/{$cat->id}.jpg' alt='NO IMAGE' />
                        {$cat->name} 
                    </div>
                </a>
            {/foreach}
        {else if isset($allCategories)}
            {foreach from=$allCategories item=cat}
                {if $cat->parent == null}
                    <a href="/Plug_IT/index.php?page=Catalogue&cat={$cat->name}&id={$cat->id}">
                        <div class='categoryThumbnail'>
                            <img class='categoryImage' src='assets/pix/category/{$cat->id}.jpg' alt='NO IMAGE' />
                            {$cat->name} 
                        </div>
                    </a>
                {/if}
            {/foreach}
        {/if}

        {if isset($products)}
            {foreach from=$products item=product}
                <a href='/Plug_IT/index.php?page=Product&id={$product->id}'>
                    <div class='productThumbnail'>
                        <img class='productImage' src='assets/pix/product/{$product->id}.jpg' alt='NO IMAGE' />
                        <div class='productName'>
                            <h4>{$product->name}</h4>
                        </div>
                        <div class='shortDescription'>
                            <p>{$product->description}</p></div>
                        <div id='productBuy'><p>€{$product->price}</p>
                        </div>
                    </div>
                </a>
            {/foreach}
        {/if}
    </div>
{/block}
