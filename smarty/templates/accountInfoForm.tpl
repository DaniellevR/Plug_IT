{block name=accountInfoForm}
    <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
        <div>
            <h3>Gebruiker wijzigen</h3>
        </div>
        <div>
            <label for="users_edit">Gebruikersnaam</label>
            <select type="text" id="users_edit" name="users_edit" onchange="grabInfo(this, 'editUser', 'contentDivEditUser')">
                {foreach from=$users item=user }
                    <option class="category" value="{$user->username}" id="{$user->username}">{$user->username}</option>
                {/foreach}
            </select>
        </div>
        <div id="contentDivEditUser"></div>
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
