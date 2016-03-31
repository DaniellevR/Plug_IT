{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Bestelling en levering</h1>
        {if isset($confirmed)}
            <h1>Order bevestigd!</h1>
        {else if isset($cartList)}
            {$total = 0}
            {foreach from=$cartList item=product}
                <div class='orderInfo'>
                    <div class='productName'>
                        <h4>{$product->name}</h4>
                    </div>
                    <div id='productBuy'><p>€{$product->price}</p>
                    </div>
                    <div>
                        <p>Aantal: {$product->amountInCart}</p>
                    </div>
                </div>
                {$total = $total + ($product->price * $product->amountInCart)}
            {/foreach}
            <h3>Totaalprijs: €{$total}</h3>
            <form action="/Plug_IT/index.php?page=OrderAndDelivery" method="get">
                <input name="page" value="OrderAndDelivery" hidden/>
                <input name="confirmed" value="true" hidden/>
                <input id="confirmButton" type="submit" value="Akkoord"/>
            </form>
        {else}
            <h3>U heeft nog geen producten in uw winkelwagentje.</h3>
        {/if}
    </div>
{/block}
