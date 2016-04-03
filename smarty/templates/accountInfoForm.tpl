{block name=accountInfoForm}
    <form method="POST" enctype="multipart/form-data" onsubmit="editUser(this, event)">

        {if $errors !== ""}
            {if isset($smarty.get.page)}
                {if $smarty.get.page === "Register" || $smarty.get.page === "MyAccount"}
                    <div class="errortext">
                        {$errors}
                    </div>
                {/if}
            {/if}
        {/if}

        {$username = ""}
        {$user = ""}

        {if isset($smarty.get.page) && $smarty.get.page !== "MyAccount"}
            <div>
                <h3>Gebruiker wijzigen</h3>            
            </div>
            <div>
                <label for="users_edit">Gebruikersnaam</label>
                <select type="text" id="users_edit" name="users_edit" onchange="grabInfo(this, 'editUser', 'contentDivEditUser')">
                    {foreach from=$users item=useritem }
                        {if $username === ""}
                            {$username = $useritem->username}
                            {$user = $useritem}
                        {/if}
                        <option class="category" value="{$useritem->username}" id="{$useritem->username}">{$useritem->username}</option>
                    {/foreach}
                </select>
            </div>
        {else}
            {$username = $smarty.session.username}
            {foreach from=$users item=useritem }
                {if $username === $useritem->username}
                    {$user = $useritem}
                {/if}
            {/foreach}
        {/if}

        <div id="contentDivEditUser">
            <div><h5>Persoonsgegevens</h5></div>
            <div><label for="firstname">Name</label><input type="text" id="firstname" name="firstnameEditUser" required="true" placeholder="Voornaam" value="{$user->firstname}"></div>
            <div><label></label><input type="text" id="prefix" name="prefixEditUser" placeholder="Tussenvoegsel" value="{$user->prefix}"></div>
            <div><label></label><input type="text" id="lastname" name="lastnameEditUser" required="true" placeholder="Achternaam" value="{$user->lastname}"></div>
            <div><label for="email">Email</label><input type="email" name="emailEditUser" id="email"  required="true" value="{$user->email}"/></div>
            <div><label for="telephonenumber">Telefoonnummer</label><input type="text" id="telephonenumber" name="telephonenumberEditUser" required="true" value="{$user->telephonenumber}"></div>

            {foreach from=$users item=useritem }
                {if $useritem->username === $username}
                    <div><h5>Adresgegevens</h5></div>
                    <div><label for="streetname">Adres</label><input type="text" id="streetname" name="streetnameEditUser" required="true" placeholder="Straatnaam" value="{$useritem->streetname}"></div>
                    <div><label></label><input type="text" name="housenumberEditUser" required="true" placeholder="Huisnummer" value="{$useritem->housenumber}"></div>
                    <div><label></label><input type="text" name="housenumberSuffixEditUser" placeholder="Huisnummertoevoeging" value="{$useritem->housenumber_suffix}"></div>
                    <div><label for="postalCode">Postcode</label><input type="text" name="postalCodeEditUser" required="true" value="{$useritem->postalCode}"></div>
                    <div><label for="city">Woonplaats</label><input type="text" name="cityEditUser" required="true" value="{$useritem->city}"></div>
                    {/if}
                {/foreach}

            <div><h5>Accountgegevens</h5></div>

            {if isset($smarty.get.page) && $smarty.get.page === "MyAccount"}
                <input type="text" name="rolesEditUser" value="User" required="true" hidden="true">
            {else}
                <label>Rol</label><select type="text" name="rolesEditUser">
                    {foreach from=$roles item=role }
                        {if $user->rolename === $role}
                            <option value="{$role->name}" selected>{$role->name}</option>
                        {else}
                            <option value="{$role->name}">{$role->name}</option>
                        {/if}
                    {/foreach}
                </select>
            {/if}

            <div><label for="usernameEditUser">Gebruikersnaam</label><input type="text" id="usernameEditUser" name="usernameEditUser" readonly value="{$username}"></div>
            <div><label for="passwordEditUser">Huidige wachtwoord</label><input type="password" id="passwordEditUser" name="passwordEditUser"></div>
            <div><label for="newPasswordEditUser">Nieuwe wachtwoord</label><input type="password" id="newPasswordEditUser" name="newPasswordEditUser"></div>
            <div><label for="repeat_passwordEditUser">Herhaal wachtwoord</label><input type="password" id="repeat_passwordEditUser" name="repeat_passwordEditUser"></div>
        </div>
        <div>
            <label></label>
            <button type="submit" value="Submit" class="button">Wijzigen</button>
        </div>
    </form>

    {*<form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
    <h3>Gebruiker wijzigen</h3>
    <div class="line">
    <label>Gebruikersnaam:</label>
    <div class="input">
    <select id="users_edit" name="users_edit" onchange="grabInfo(this, 'editUser', 'contentDivEditUser')">
    {foreach from=$users item=user }
    <option class="category" value="{$user->username}" id="{$user->username}">{$user->username}</option>
    {/foreach}
    </select>
    </div>
    </div>
    <div id="contentDivEditUser"></div>
    <button type="submit" value="Submit" class="form_button">Wijzigen</button>
    </form>*}
{/block}
