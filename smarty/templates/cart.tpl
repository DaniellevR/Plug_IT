{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Winkelwagen</h1>
        {if isset($cartList)}
            {$total = 0}
            {foreach from=$cartList item=product}
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
                        <div class="input">
                            <input type="number" min="1" step="1" value="1" />
                        </div>
                    </div>
                </a>
                {$total = $total + $product->price}
            {/foreach}
            <h3>Totaalprijs: €{$total}</h3>
        {else}
            <h3>U heeft nog geen producten in uw winkelwagentje.</h3>
        {/if}
    </div>
{/block}