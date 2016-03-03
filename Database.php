<?php

//include_once 'Category.inc.php';

/**
 * Description of Database
 *
 * @author Daniëlle
 */
class Database {

//    private $conn;

    function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'mydb');
        if ($this->conn->connect_errno != 0) { //er gaat iets fout ...
            die("Probleem bij het leggen van connectie of selecteren van database");
        }
    }

    function __destruct() {
//        try {
//            $this->result->close();
//        } catch (Exception $ex) {
//        }
//        if (!is_null($this->conn)) {
//            $this->conn->close();
//        }
    }

    public function addCategory($name, $description, $parent) {//$category        
        $stmt = $this->conn->prepare('INSERT INTO category VALUES (?, ?, ?, ?)');
        $stmt->bind_param("isss", $id, $name, $description, $parent);
        $id = 0;
        $stmt->execute();
        $stmt->close();
    }

    public function getCategories() {
        $query = "SELECT * FROM category";
        $this->result = $this->conn->query($query);
        $categories = array();
        while ($row = mysqli_fetch_array($this->result)) {
            $id = $row["id"];
            $name = $row["name"];
            $description = $row["description"];
            $parent = $row["parent"];
            require_once 'Category.inc.php';
            $category = new Category($id, $name, $description, $parent);//, $image);
            $categories[] = $category;
        }

        return $categories;
    }

}
