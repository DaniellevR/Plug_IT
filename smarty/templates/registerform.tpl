{block name=registerform}
    <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event);">

        {if $errors !== ""}
            <div class="errortext">
                {$errors}
            </div>
        {/if}
        
        <input type="hidden" name="page" value="{$page}">
        
        <div>
            {if isset($smarty.get.page) && $smarty.get.page !== "Register"}
                <h3>Gebruiker toevoegen</h3>
            {/if}
            <h5>Persoonsgegevens</h5>
        </div>
        <div>
            <label for="firstname">Name</label>
            <input type="text" id="firstname" name="firstname" required="true" placeholder="Voornaam">
        </div>
        <div>
            <label></label>
            <input type="text" id="prefix" name="prefix" required="true" placeholder="Tussenvoegsel">
        </div>
        <div>
            <label></label>
            <input type="text" id="lastname" name="lastname" required="true" placeholder="Achternaam">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email"  required="true"/>
        </div>
        <div>
            <label for="telephonenumber">Telefoonnummer</label>
            <input type="text" id="telephonenumber" name="telephonenumber" required="true">
        </div>

        <div><h5>Adresgegevens</h5></div>
        <div>
            <label for="streetname">Adres</label>
            <input type="text" id="streetname" name="streetnameAddUser" required="true" placeholder="Straatnaam">
        </div>
        <div>
            <label></label>
            <input type="text" name="housenumberAddUser" required="true" placeholder="Huisnummer">
        </div>
        <div>
            <label></label>
            <input type="text" name="housenumberSuffixAddUser" placeholder="Huisnummertoevoeging">
        </div>
        <div>
            <label for="postalCode">Postcode</label>
            <input type="text" name="postalCodeAddUser" required="true">
        </div>
        <div>
            <label for="city">Woonplaats</label>
            <input type="text" name="cityAddUser" required="true">
        </div>
        <div><h5>Accountgegevens</h5></div>

        {if isset($smarty.cookies.PHPSESSID) && isset($smarty.session.usertype)}
            {if $smarty.session.usertype === "Administrator"}
                <div>
                    <label for="roles">Rol</label>
                    <select type="text" id="roles" name="roles">
                        {foreach from=$roles item=role }
                            <option class="category" value="{$role->name}">{$role->name}</option>
                        {/foreach}
                    </select>
                </div>
            {else}
                <div>
                    <input type="text" name="roles" value="User" required="true" hidden="true">
                </div>
            {/if}
        {else}
            <input type="text" name="roles" value="User" required="true" hidden="true">
        {/if}

        <div>
            <label for="username">Gebruikersnaam</label>
            <input type="text" id="username" name="username" required="true">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required="true">
        </div>
        <div>
            <label for="repeat_password">Password Again</label>
            <input type="password" id="repeat_password" name="repeat_password" required="true">
        </div>
        <div>
            <label></label>
            <button type="submit" value="Registreren" class="button">Registreren</button>
        </div>
    </form>
{/block}