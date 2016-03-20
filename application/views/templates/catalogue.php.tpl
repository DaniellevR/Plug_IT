{include file="header.tpl"}
{include file="navigation.tpl"}

<div class="content">
    <div class="content">
        {include file='Database.php'}
        
        $db = new Database;
        $categories = $db->getCategories();

        $category_list = array();

        foreach ($categories as $cat) {
        if ($cat->parent === null) {
        echo "<a href='catalogue.php'><div class='categoryThumbnail'>"
                . "<img class='categoryImage' src='pix/category" . $cat->id . ".jpg' alt='TODO' />"
                . $cat->name . "</div></a>";
        }
        }
    </div>

    {include file="footer.tpl"}