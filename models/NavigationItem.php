<?php

require_once('models/database.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NavigationItem
 *
 * @author Daniëlle
 */
class NavigationItem extends Database {

    public $id;
    public $name;
    public $page;
    public $location;
    public $parent;

    public function getNavigationItems() {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM navigationItem";
            $result = $this->conn->query($sql);

            $navigationItems = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $navigationItem = new NavigationItem();
                    $navigationItem->id = $row['id'];
                    $navigationItem->name = $row['name'];
                    $navigationItem->page = $row['page'];
                    $navigationItem->location = $row['location'];
                    $navigationItem->parent = $row['parent'];
                    $navigationItems[] = $navigationItem;
                }
            }

            $this->closeConnection();

            return $navigationItems;
        } else {
            return false;
        }
    }

}
