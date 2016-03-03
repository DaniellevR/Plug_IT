/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

<html>
    <?php
    //include "database.php";
    ?>
    <body>
        <?php
        $db = new Database;
        $db->addCategory($_POST['categoryname'], $_POST['category_description'], $_POST['formParentCategories'], $_POST['image']);
        //header('Location: admin.php');
        ?>
    </body>
</html>