{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Inloggen</h1>
        <form class="loginform" action="" onsubmit="return login(this, event, 'Home')" method="POST" enctype="multipart/form-data">
            <label>Gebruikersnaam:<input type="text" name="username" required="true"></label>
            <label>Wachtwoord:<input type="password" name="password" required="true"></label>
            <button type="submit" value="Submit" class="form_button">Inloggen</button>
        </form>

        <a href="/Plug_IT/index.php?page=Register">Heeft u nog geen account? Dan kunt u hier registreren.</a>
    </div>
{/block}
