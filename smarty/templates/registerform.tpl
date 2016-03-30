{extends file='register.tpl'}
{block name=registerform}
    <form class="loginform" onsubmit="" method="POST" enctype="multipart/form-data">
        <label>Gebruikersnaam:<input type="text" name="username" required="true"></label>
        <label>Wachtwoord:<input type="password" name="password" required="true"></label>
        <button type="submit" value="Submit" class="form_button">Inloggen</button>
    </form>
{/block}