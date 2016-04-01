{block name=loginform}
    <form class="loginform" onsubmit="login(this, event);" method="POST" enctype="multipart/form-data">
        
        {if $errors !== ""}
            <div class="errortext">
                {$errors}
            </div>
        {/if}
        
        <div>
            <label for="usernameLogin_remove">Gebruikersnaam</label>
            <input type="text" id="usernameLogin" name="username" required="true"/>
        </div>
        <div>
            <label for="passwordLogin">Wachtwoord</label>
            <input type="password" id="passwordLogin" name="password" required="true"/>
        </div>
        <div>
            <label></label>
            <button type="submit" value="Submit" class="button">Inloggen</button>
        </div>
    </form>
    <a href="/Plug_IT/index.php?page=Register">Heeft u nog geen account? Dan kunt u hier registreren.</a>
{/block}
