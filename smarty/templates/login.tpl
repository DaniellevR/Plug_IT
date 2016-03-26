{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Inloggen</h1>
        <form action="" onsubmit="return login(this, event, 'Home')" method="POST" enctype="multipart/form-data">
            <div class="line">
                <label>Gebruikersnaam:</label>
                <div class="input">
                    <div class="input">
                        <input type="text" name="username" required="true">
                    </div>
                </div>
                <label>Wachtwoord:</label>
                <div class="input">
                    <div class="input">
                        <input type="password" name="password" required="true">
                    </div>
                </div>
            </div>
            <button type="submit" value="Submit" class="form_button">Inloggen</button>
        </form>
    </div>
{/block}
