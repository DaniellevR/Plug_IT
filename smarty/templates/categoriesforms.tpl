{extends file='admin.tpl'}
{block name=categoriesforms}
    <div class="adminpart">
        <form action="handlers/UploadCategoryHandler.php" method="POST" enctype="multipart/form-data">
            <div>
                <h3>Categorie toevoegen</h3>
            </div>
            <div>
                <label for="categoriesEdit">Categorienaam</label>
                <input type="text" id="categoryname" name="categoryname" required="true"/>
            </div>
            <div>
                <label for="category_description">Omschrijving</label>
                <input type="text" id="category_description" name="category_description" required="true"/>
            </div>
            <div>
                <label for="username">Ouder categorie</label>
                <select type="text" id="categoriesAdd" name="parent">
                    <option value="">-</option>
                    {foreach from=$categories[0] item=parent }
                        <option value="{$parent->id}">{$parent->name}</option>
                    {/foreach}
                </select>
            </div>
            <div>
                <label for="image">Foto categorie</label>
                <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/>
            </div>
            <div>
                <label></label>
                <input type="submit" value="Toevoegen" id="addCategory" class="button"/>
            </div>
        </form>


        <form action="handlers/EditCategoryHandler.php" method="POST" enctype="multipart/form-data">
            <div>
                <h3>Categorie wijzigen</h3>
            </div>
            <div>
                <label for="categoriesEdit">Categorienaam</label>
                <select type="text" id="categories_edit" id="categoriesEdit" name="categoriesEdit" onchange="grabInfo(this, 'editCategory', 'contentDivEditCategory')">
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
            <div id="contentDivEditCategory">
                {$cat = ""}
                {$children = ""}
                {foreach from=$categories[0] item=parent }
                    {if $cat === ""}
                        {$cat = $parent}
                        {foreach from=$categories[1] item=child }
                            {if $child->parent === $cat->id}
                                {$children = "yes"}
                            {/if}
                        {/foreach}
                    {/if}
                {/foreach}

                <div>
                    <label for="categoryNewName">Categorienaam</label>
                    <input type="text" id="categoryNewName" name="newname" required="true" value="{$cat->name}"/>
                </div>
                <div>
                    <label for="categoryNewDescription">Omschrijving</label>
                    <input type="text" id="categoryNewDescription" name="category_description" required="true" value="{$cat->description}"/>
                </div>
                <div>
                    <label for="categoriesParentEdit">Ouder categorie</label>
                    <select type="text" id="categories_edit" id="categoriesParentEdit" name="parent" onchange="grabInfo(this, 'editCategory', 'contentDivEditCategory')" {if $cat->parent === NULL && $children !== ""}disabled{/if}>
                        <option value="">-</option>
                        {foreach from=$categories[0] item=parent }
                            <option class="category" value="{$parent->id}" id="{$parent->id}" {if $cat->parent === $parent->id}selected{/if}>{$parent->name}</option>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent === $parent->id}
                                    <option class="subcategory" value="{$child->id}" id="{$child->id}" {if $cat->parent === $child->id}selected{/if}>{$child->name}</option>
                                {/if}
                            {/foreach}
                        {/foreach}
                    </select>
                </div>

                <div>
                    <label for="imageEditCategory">Foto categorie</label>
                    <input type="file" accept="image/*" name="image" id="imageEditCategory" class="input_text"/>
                </div>
                <div>
                    <img type="image" src="/Plug_IT/assets/pix/categories/{$cat->id}.png" class="image" />
                </div>
            </div>
            <div>
                <label></label>
                <input type="submit" value="Wijzigen" id="addCategory" class="button"/>
            </div>
        </form>

        <form method="POST" enctype="multipart/form-data" onsubmit="removeCategory(this, event)">
            <div>
                <h3>Categorie verwijderen</h3>
            </div>
            <div>
                <label for="categories_remove">Categorienaam</label>
                <select type="text" id="categories_remove" name="categoriesRemove">
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
            <div>
                <label></label>
                <button type="submit" value="Submit" class="button">Verwijderen</button>
            </div>
        </form>

    </div>
{/block}