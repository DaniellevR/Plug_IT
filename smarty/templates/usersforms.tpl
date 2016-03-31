{extends file='admin.tpl'}
{block name=usersforms}
{*    <div class="users adminpart" id="part3">*}
<div class="adminpart">
    {block name="parent_block"}{include file="registerform.tpl"}{/block}
        <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
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
        </form>
    </div>
{/block}