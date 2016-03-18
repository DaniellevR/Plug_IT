<div class="side_content">
    <ul class="nav">
        <li><a href='catalogue.php'>Catalogus</a></li>       
            {foreach from=$categories[0] item=parent }
                {*        <a href="{render('category', 'test')}">{*}
            <li>{$parent->name}</li>
            <ul>
                {foreach from=$categories[1] item=child }
                    {if $child->parent == $parent->id}
                        <li>{$child->name}</li>
                        {/if}
                    {/foreach}
            </ul>
        {/foreach}
    </ul>
</div>