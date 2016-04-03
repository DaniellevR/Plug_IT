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
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Database.inc.php");

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
            $sql = "SELECT * FROM navigationitem";
            $result = $this->conn->query($sql);

            $navigationItems = array();

            if ($result->num_rows > 0) {
//            if ($result != null) {
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
