<?php

$file = fopen("C://cathandler.txt", "w");
fwrite($file, $_SERVER['REQUEST_URI']);
fclose($file);

$tmp_file = $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];

$file = fopen("C://test.txt", "w");
fwrite($file, "Action : " + $action + "Temp : " + $tmp_file + " ; ID : " + $id);
fclose($file);

if (!is_dir("/categories/")) {
    mkdir("/categories/");
}

move_uploaded_file($tmp_file, '/categories/' . $id + ".png");

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'addCategory' :
            $adminCtrl->addCategory();
            break;
        case 'editCategory' :
            $adminCtrl->editCategory();
            break;
        case 'removeCategory' :
            $adminCtrl->removeCategory();
            break;
    }


//    $tmp_file = $_FILES['image']['tmp_name'];
//    $filename = $_FILES['image']['name'];
//
//    $file = fopen("C://test.txt", "w");
//    fwrite($file, "Action : " + $action + "Temp : " + $tmp_file + " ; ID : " + $id);
//    fclose($file);
//
//    if (!is_dir("/categories/")) {
//        mkdir("/categories/");
//    }
//
//    move_uploaded_file($tmp_file, '/categories/' . $id + ".png");

    header("Refresh:0");
}
?>