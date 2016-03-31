{block name=registerform}
    <form method="POST" enctype="multipart/form-data" onsubmit="addUser(this, event)">
        <h3>Gebruiker toevoegen</h3>
        <h5>Persoonsgegevens</h5>
        <label>Naam:</label>
        <input type="text" name="firstname" required="true" placeholder="Voornaam">
        <input type="text" name="prefix" required="true" placeholder="tv">
        <input type="text" name="lastname" required="true" placeholder="Achternaam">
        <label>Email:</label>
        <input type="text" name="email" required="true">
        <label>Telefoonnummer:</label>
        <input type="text" name="telephonenumber" required="true">
        <h5>Adresgegevens</h5>
        <label>Adres:</label>
        <input type="text" name="streetnameAddUser" required="true" placeholder="Straatnaam">
        <input type="text" name="housenumberAddUser" required="true" placeholder="nr">
        <input type="text" name="housenumberSuffixAddUser" placeholder="tv">
        <label>Postcode:</label>
        <input type="text" name="postalCodeAddUser" required="true">
        <label>Woonplaats:</label>
        <input type="text" name="cityAddUser" required="true">
        <h5>Accountgegevens</h5>
        <label>Gebruikersnaam:</label><input type="text" name="username" required="true">
        <label>Rol:</label>
        <select name="roles">
            {foreach from=$roles item=role }
                <option class="category" value="{$role->name}">{$role->name}</option>
            {/foreach}
        </select>
        <label>Wachtwoord:</label><input type="password" name="password" required="true">
        <label>Herhaal wachtwoord:</label><input type="password" name="repeat_password" required="true">
        <button type="submit" value="Submit" class="form_button">Toevoegen</button>
    </form>
{/block}