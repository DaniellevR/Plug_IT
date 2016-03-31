{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Winkelwagen</h1>
        {if isset($cartList)}
            {$total = 0}
            {foreach from=$cartList item=product}
                <div class='productThumbnail'>
                    <img class='productImage' src='assets/pix/product/{$product->id}.jpg' alt='NO IMAGE' />
                    <a href='/Plug_IT/index.php?page=Product&id={$product->id}'>
                        Naar productpagina
                    </a>
                    <div class='productName'>
                        <h4>{$product->name}</h4>
                    </div>
                    <div class='shortDescription'>
                        <p>{$product->description}</p></div>
                    <div id='productBuy'><p>€{$product->price}</p>
                    </div>
                    <div class="input">
                        <form action="/Plug_IT/index.php?page=Cart" method="post">
                            <input name="amount" type="number" min="1" step="1" value="{$product->amountInCart}" />
                            <input name="page" value="Cart" hidden/>
                            <input name="id" value="{$product->id}" hidden/>
                            <input id="addToCartButton" type="submit" value="Bevestigen"/>
                        </form>
                        <form action="/Plug_IT/index.php?page=Cart" method="post">
                            <input name="removeId" value="{$product->id}" hidden/>
                            <input id="removeFromCartButton" type="submit" value="Verwijderen"/>
                        </form>
                    </div>
                </div>
                {$total = $total + ($product->price * $product->amountInCart)}
            {/foreach}
            <h3>Totaalprijs: €{$total}</h3>
            <form action="/Plug_IT/index.php?page=OrderAndDelivery" method="get">
                <input name="page" value="OrderAndDelivery" hidden/>
                <input name="pay" value="true" hidden/>
                <input id="payButton" type="submit" value="Afrekenen"/>
            </form>
        {else}
            <h3>U heeft nog geen producten in uw winkelwagentje.</h3>
        {/if}
    </div>
{/block}