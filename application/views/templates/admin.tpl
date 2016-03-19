{include file="header.tpl"}
{include file="navigation.tpl"}

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script language="javascript">
    var id = -1;

    $(document).on("hover", ".adminpanel ul li", function() {
        var i = $(this).index();
        $('#item' + (i + 1)).css("background-color", "#EAF2F5");
    }).on("mouseout", ".adminpanel ul li", function() {
        var i = $(this).index();
        if (i !== id) {
            $('#item' + (i + 1)).css("background-color", "lightblue");
        }
    });


    $(document).ready(function() {
        $('.adminpanel ul li').click(function() {
            var i = $(this).index();
            id = i;
            $('.menu_item').css("background-color", "lightblue");
            $('#item' + (i + 1)).css("background-color", "#e6f2ff");
            $('.fullarticle').hide();
            $('#article' + (i + 1)).show();
        });
    });
</script>

<div class="content">
    <h1>Admin</h1>

    <div class="adminpanel">
        <ul>
            <li class="menu_item" id="item1">Categorieën</li>
            <li class="menu_item" id="item2">Producten</li>
            <li class="menu_item" id="item3">Gebruikers</li>
            <li class="menu_item" id="item4">Orders</li>
        </ul>
    </div>

    <div class="categories fullarticle" id="article1">      
        <form action="" method="POST" enctype="multipart/form-data">
            Categorienaam:<br/>
            <input type="text" name="categoryname" required="true"><br/>
            Omschrijving:<br/>
            <input type="text" name="category_description" required="true"><br/>
            Ouder categorie:<br/>
            <select name="formParentCategories">
                <option value="">-</option>
                {foreach from=$categories[0] item=parent }
                    <option>{$parent->name}</option>
                {/foreach}
            </select><br/>
            <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/><br/>
            <input type="submit" value="Toevoegen">
        </form>
        <form>
            Categorie:<br/>
            <select name="Categories">
                {foreach from=$categories[0] item=parent }
                    <option>'{$parent->name}'</option>

                    {foreach from=$categories[1] item=child }
                        {if $child->parent == $parent->id}
                            <option>'{$child->name}' uit categorie '{$parent->name}'</option>
                        {/if}
                    {/foreach}
                {/foreach}


                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br/>
            <input type="submit" value="Verwijderen">
        </form>
    </div>

    <div class="products fullarticle" id="article2">
        <ul class="admin_list">
        </ul>

        <form>
            Productnaam:<br/>
            <input type="text" name="productnaam" required="true"><br/>
            Omschrijving:<br/>
            <input type="text" name="product_omschrijving" required="true"><br/>
            Prijs:<br/>
            <input type="number" min="0.01" step="0.01" value="0.01" /><br/>
            <!--<span class="currencyinput">€<input type="number" min="0.01" step="0.01" value="0.01" name="price"></span><br/>-->
            <input type="file" accept="image/*" name="image" id="image" class="input_text" required="true"/><br/>
            <input type="submit" value="Toevoegen">
        </form>
        <form>
            Categorienaam:<br/>
            <select name="Categories">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br/>
            <input type="submit" value="Verwijderen">
        </form>
    </div>

    <div class="users fullarticle" id="article3">
        <form>
            Gebruikersnaam:<br/>
            <input type="text" name="username" required="true"><br/>
            Type:<br/>
            <select name="types">
                <option value="User">Gebruiker</option>
                <option value="Admin">Admin</option>
            </select><br/>
            Wachtwoord:<br/>
            <input type="password" name="password" required="true"><br/>
            Herhaal wachtwoord:<br/>
            <input type="password" name="repeat_password" required="true"><br/>
            <input type="submit" value="Toevoegen">
        </form>
    </div>

    <div class="orders fullarticle" id="article4">
        <form>
            Gebruikersnaam:<br/>
            <input type="text" name="username" required="true"><br/>
            Type:<br/>
            <select name="types">
                <option value="User">Gebruiker</option>
                <option value="Admin">Admin</option>
            </select><br/>
            Wachtwoord:<br/>
            <input type="password" name="password" required="true"><br/>
            Herhaal wachtwoord:<br/>
            <input type="password" name="repeat_password" required="true"><br/>
            <input type="submit" value="Toevoegen">
        </form>
    </div>

</div>

{include file="footer.tpl"}