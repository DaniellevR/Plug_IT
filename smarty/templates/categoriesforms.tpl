{extends file='admin.tpl'}
{block name=categoriesforms}
    <div class="adminpart">
        <form action="handlers/UploadCategoryHandler.php" method="POST" enctype="multipart/form-data">
            <h3>Categorie toevoegen</h3>
            <label>Categorienaam:</label>
            <input type="text" name="categoryname" required="true">
            <label>Omschrijving:</label>
            <input type="text" name="category_description" required="true">
            <label>Ouder categorie:</label>
            <select id="categoriesAdd" name="parent">
                <option value="">-</option>
                {foreach from=$categories[0] item=parent }
                    <option value="{$parent->id}">{$parent->name}</option>
                {/foreach}
            </select>
            <label>Foto categorie:</label>
            <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
            <button type="submit" value="Submit" class="form_button">Toevoegen</button>
        </form>

        <form action="handlers/EditCategoryHandler.php" method="POST" enctype="multipart/form-data">
            <h3>Categorie wijzigen</h3>
            <div class="line">
                <label>Categorienaam:</label>
                <div class="input">
                    <select id="categories_edit" id="categoriesEdit" name="categoriesEdit" onchange="grabInfo(this, 'editCategory', 'contentDivEditCategory')">
                        {foreach from=$categories[0] item=parent }
                            <option class="category" value="{$parent->id}" id="{$parent->id}">{$parent->name}</option>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent === $parent->id}
                                    <option class="subcategory" value="{$child->id}" id="{$child->id}">{$child->name}</option>
                                {/if}
                            {/foreach}
                        {/foreach}
                    </select>
                </div>
            </div>
            <div id="contentDivEditCategory">

                {$cat = ""}
                {foreach from=$categories[0] item=parent }
                {if $cat === ""}{$cat = $parent}{/if}
            {/foreach}

            <div class="line"><label>Nieuwe naam:</label><div class="input"><input id="newname" type="text" name="newname" value="{$cat->name}" required="true"></div></div>
            <div class="line"><label>Omschrijving:</label><div class="input"><input id="desc" type="text" name="category_description" value="{$cat->description}" required="true"></div></div>
            <div class="line"><label>Ouder categorie:</label><div class="input"><select name="parent">


                        <option value="">-</option>
                        {foreach from=$categories[0] item=parent }
                            <option class="category" value="{$parent->id}" id="{$parent->id}" {if $cat->parent === $parent->id}selected{/if}>{$parent->name}</option>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent === $parent->id}
                                    <option class="subcategory" value="{$child->id}" id="{$child->id}" {if $cat->parent === $child->id}selected{/if}>{$child->name}</option>
                                {/if}
                            {/foreach}
                        {/foreach}


                    </select></div></div>
            <div class="line"><label>Foto categorie:</label><div class="input"><input type="file" accept="image/*" name="image" id="image" required="true"/></div></div>

            <img src="/Plug_IT/assets/pix/categories/{$cat->id}.png" class="image" />
        </div>
        <button type="submit" value="Submit" class="form_button">Wijzigen</button>
    </form>

    <form method="POST" enctype="multipart/form-data" onsubmit="removeCategory(this, event)">
        <h3>Categorie verwijderen</h3>
        <div class="line">
            <label>Categorienaam:</label>
            <div class="input">
                <select id="categories_remove" name="categoriesRemove">
                    {foreach from=$categories[0] item=parent }
                        <option class="category" value="{$parent->id}">{$parent->name}</option>
                        {foreach from=$categories[1] item=child }
                            {if $child->parent === $parent->id}
                                <option class="subcategory" value="{$child->id}">{$child->name}</option>
                            {/if}
                        {/foreach}
                    {/foreach}
                </select>
            </div>
        </div>
        <button type="submit" value="Submit" class="form_button">Verwijderen</button>
    </form>
</div>
{/block}