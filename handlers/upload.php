<?php

$tmp_file = $_FILES['image']['tmp_name'];
$filename = $_FILES['image']['name'];

//$id = $_GET['filename'];

//$file = fopen("C://test.txt", "w");
//fwrite($file, "Temp : " + $tmp_file + " ; ID : " + $id);
//fclose($file);

if (!is_dir("/categories/")) {
    mkdir("/categories/");
}

//move_uploaded_file($tmp_file, '/categories/' . $id + ".png");
move_uploaded_file($tmp_file, '/categories/test.png');

//header("Refresh:0");
?>