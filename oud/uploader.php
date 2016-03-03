<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$target_path = "categories/";

$target_path = $target_path . basename($_FILES['image']['categoryname']);

if (move_uploaded_file($_FILES['image']['temp_categoryname'], $target_path)) {
    echo "The file " . basename($_FILES['image']['categoryname']) .
    " has been uploaded";
} else {
    echo "There was an error uploading the file, please try again!";
}

