{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Product</h1>
        <div class='productInfo'>
            <div id='productTitle'>
                <h2>
                    {$product->name}
                </h2></div><div class='productImage'><img src='assets/pix/product/{$product->id}.jpg' alt='NO IMAGE' />
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
        </div>
    </div>
{/block}
