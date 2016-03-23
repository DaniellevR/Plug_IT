<script type="text/javascript" src={base_url()}assets/js/navigation".js"></script>
<div class="content_container">
    <div class="navigation">
        <ul class="nav">
            <a href={$catalogue}>Catalogus</a>
            {foreach from=$categories[0] item=parent }
                <a href={$categorypage}?category={$parent->name|replace:' ':'+'}><li>{$parent->name}</li></a>
                <ul>
                    {foreach from=$categories[1] item=child }
                        {if $child->parent == $parent->id}
                            <a href={$productpage}?category={$parent->name|replace:' ':'+'}&subcategory={$child->name|replace:' ':'+'}><li>{$child->name}</li></a>
                        {/if}
                    {/foreach}
                </ul>
            {/foreach}
        </ul>
    </div>