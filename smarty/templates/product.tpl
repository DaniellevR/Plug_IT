{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Product</h1>
        <div class='productInfo'>
            <div id='productTitle'>
                <h2>
                    {$product->name}
                </h2></div><div class='productImage'><img src='assets/pix/products/{$product->id}.png' alt='NO IMAGE' />
            </div>
            <div id='description'>
                <p>
                    {$product->description}
                </p>
            </div>
            <div id='productBuy'>
                <p>€{$product->price}
                </p>
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
    </div>
{/block}
