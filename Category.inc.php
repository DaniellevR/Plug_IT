<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author Daniëlle
 */
class Category {

//    function __construct($name, $description, $parent, $image) {
    function __construct($id, $name, $description, $parent) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->parent = $parent;
//        $this->image = $image;
    }
}
