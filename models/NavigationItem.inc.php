<?php
/*
*
* Webshop Plug IT
*
* Made by : Nigel Liebers and Danielle van Rooij
*
* Avans 's-Hertogenbosch 2016 (c)
*
*/

//require_once('models/database.php');
$root = "W:\Websites\TEMP\gaststudent99\Plug_IT";
require_once($root . "/models/Database.inc.php");

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

    /**
     * Get navigation items
     * @return boolean|\NavigationItem
     */
    public function getNavigationItems() {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM navigationitem";
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
