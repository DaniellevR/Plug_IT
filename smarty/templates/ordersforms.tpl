{extends file='admin.tpl'}
{block name=ordersforms}
{*    <div class="orders adminpart" id="part4">*}
<div class="adminpart">
        <form>
            <h3>Order toevoegen</h3>
            <div class="line">
                <label>Ordernaam:</label>
                <div class="input">
                    <input type="text" name="username" required="true">
                </div>
            </div>
            <div class="line">
                <label>Type:</label>
                <div class="input">
                    <select name="types">
                        <option value="User">Gebruiker</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="line">
                <label>Wachtwoord:</label>
                <div class="input">
                    <input type="password" name="password" required="true">
                </div>
            </div>
            <div class="line">
                <label>Herhaal wachtwoord:</label>
                <div class="input">
                    <input type="password" name="repeat_password" required="true">
                </div>
            </div>
            <button type="submit" value="Submit" class="form_button">Toevoegen</button>
        </form>
    </div>
{/block}