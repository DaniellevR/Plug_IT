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
class Product {
    
    function __construct($name, $description, $parent, $image) {
        $this->name = $name;
        $this->description = $description;
        $this->parent = $parent;
        $this->image = $image;
    }
}