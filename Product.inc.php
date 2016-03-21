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

    function __construct($id, $name, $description, $price, $brand, $amount) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->brand = $brand;
        $this->amount = $amount;
    }

}
