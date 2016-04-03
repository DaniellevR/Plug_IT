{extends file='admin.tpl'}
{block name=ordersforms}
    <div class="adminpart">
        <form method="POST" enctype="multipart/form-data" onsubmit="">
            {$user = ""}
            {$username = ""}

            {if isset($usernameCartAdmin)}
                {$username = $usernameCartAdmin}
            {/if}

            <div>
                <h3>Order toevoegen</h3>
            </div>

            <div>
                <label for="usersAddOrder">Gebruikersnaam</label>
                <select type="text" id="usersAddOrder" name="userAddOrder">
                    {foreach from=$users item=useritem }
                        {if $useritem->username === $username}
                            {$user = $useritem}
                            <option class="category" value="{$useritem->username}" id="{$useritem->username}" selected>{$useritem->username}</option>
                        {else}
                            {if $user === "" && $username === ""}
                                {$user = $useritem}
                            {/if}
                            <option class="category" value="{$useritem->username}" id="{$useritem->username}">{$useritem->username}</option>
                        {/if}
                    {/foreach}
                </select>
            </div>
            <div id="contentDivAddOrder">
                {if $user !== ""}
                    <div><h5>Bezorgadres</h5></div>
                    <div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameDelivery" required="true" placeholder="Straatnaam" value="{$user->streetname}"></div>
                    <div><label></label><input type="text" name="housenumberDelivery" required="true" placeholder="Huisnummer" value="{$user->housenumber}"></div>
                    <div><label></label><input type="text" name="housenumberSuffixDelivery" placeholder="Huisnummertoevoeging" value="{$user->housenumber_suffix}"></div>
                    <div><label for="postalCode">Postcode</label><input type="text" name="postalCodeDelivery" required="true" value="{$user->postalCode}"></div>
                    <div><label for="city">Woonplaats</label><input type="text" name="cityDelivery" required="true" value="{$user->city}"></div>

                    <div><h5>Factuuradres</h5></div>
                    <div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameBilling" required="true" placeholder="Straatnaam" value="{$user->streetname}"></div>
                    <div><label></label><input type="text" name="housenumberBilling" required="true" placeholder="Huisnummer" value="{$user->housenumber}"></div>
                    <div><label></label><input type="text" name="housenumberSuffixBilling" placeholder="Huisnummertoevoeging" value="{$user->housenumber_suffix}"></div>
                    <div><label for="postalCode">Postcode</label><input type="text" name="postalCodeBilling" required="true" value="{$user->postalCode}"></div>
                    <div><label for="city">Woonplaats</label><input type="text" name="cityBilling" required="true" value="{$user->city}"></div>
                    {/if}
            </div>

            <div>
                <div><h5>Productaanbod</h5></div>
                {$cat = ""}
                <div>
                    <label for="categoriesAddOrder">Categorienaam</label>
                    <select type="text" id="categoriesAddOrder" name="categoriesAddOrder" onchange="grabInfo(this, 'getProductsFromCategoryAddOrder', 'contentDivAddOrder')">
                        {foreach from=$categories[0] item=parent }
                            {if $cat === ""}
                                {$cat = $parent}
                            {/if}
                            <option class="category" id="{$parent->id}">{$parent->name}</option>
                            {foreach from=$categories[1] item=child }
                                {if $child->parent === $parent->id}
                                    <option class="subcategory" id="{$child->id}">{$child->name}</option>
                                {/if}
                            {/foreach}
                        {/foreach}
                    </select>
                </div>
                <div id="contentDivAddOrder">
                    <div><label for="productslist">Productnaam</label>
                        <select type="text" id="productslist" name="productslist">
                            {foreach from=$products item=product }
                                {if $product->categoryId === $cat->id}
                                    <option value="{$product->id}">{$product->name}</option>
                                {/if}
                            {/foreach}
                        </select>
                    </div>

                    <div>
                        <label for="amount">Aantal</label>
                        <input type="number" min="1" step="1" value="1" name="amount" required="true">
                    </div>
                </div>
                <div>
                    <label></label>
                    <button type="submit" name="addOrder" value="addProduct">Product toevoegen</button>
                </div>
            </div>
            <div>
                <div><h5>Bestelling</h5></div>
                <div>
                    {assign var=count value=$productsCartAdmin|@count}
                    {if $count === 0}
                        U heeft nog geen producten toegevoegd aan de order.
                    {else}
                        <ul>
                            {foreach from=$productsCartAdmin item=product }
                                <li>{$product->name} - Aantal : <input type="number" min="1" step="1" value="{$product->amountInCartAdmin}" name="amount" required="true"></li>
                                {/foreach}
                        </ul>
                    {/if}
                </div>
            </div>
            <div>
                <label></label>
                <button type="submit" name="addOrder" value="addOrder" class="button">Toevoegen</button>
            </div>
        </form>

        <form method="POST" enctype="multipart/form-data" onsubmit="editOrder(this, event)">
            {$order = ""}
            <div>
                <h3>Order wijzigen</h3>
            </div>

            <div><label for="orderlist">Ordernummer</label>
                <select type="text" id="orderlist" name="orderlist" onchange="grabInfo(this, 'getStatesEditOrder', 'contentDivEditOrder')">
                    {foreach from=$orders item=orderitem }
                        {if $order === ""}
                            {$order = $orderitem}
                        {/if}
                        <option value="{$orderitem->id}" id="{$orderitem->state}">{$orderitem->id}</option>
                    {/foreach}
                </select>
            </div>

            <div id="contentDivEditOrder">
                <label>Status</label><select type="text" name="statesEditOrder">
                    {foreach from=$states item=state }
                        {if $order->state === $state}
                            <option value="{$state}" selected>{$state}</option>
                        {else}
                            <option value="{$state}">{$state}</option>
                        {/if}
                    {/foreach}
                </select>
            </div>

            <div>
                <label></label>
                <button type="submit" name="addOrder" value="addOrder" class="button">Wijzigen</button>
            </div>
        </form>
    </div>
{/block}