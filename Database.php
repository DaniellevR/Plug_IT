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
        $this->conn = new mysqli('sql7.freemysqlhosting.net', 'sql7111397', 'C1Axh5jdE9', 'sql7111397');
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
            $parent = $row["category_id"];
            require_once 'Category.inc.php';
            $category = new Category($id, $name, $description, $parent); //, $image);
            $categories[] = $category;
        }

        return $categories;
    }

    public function getChildCategories($catId) {
        $query = "SELECT * FROM category WHERE category_id = " . $catId;
        $this->result = $this->conn->query($query);
        if ($this->result == null) {
            return;
        }
        $categories = array();
        while ($row = mysqli_fetch_array($this->result)) {
            $id = $row["id"];
            $name = $row["name"];
            $description = $row["description"];
            $parent = $row["category_id"];
            require_once 'Category.inc.php';
            $category = new Category($id, $name, $description, $parent); //, $image);
            $categories[] = $category;
        }

        return $categories;
    }

    public function getProducts($cat) {
        $query = "SELECT * FROM product WHERE category_id = " . $cat;
        $this->result = $this->conn->query($query);
        if ($this->result == null) {
            return;
        }
        $products = array();
        while ($row = mysqli_fetch_array($this->result)) {
            $id = $row["id"];
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $brand = $row["brand"];
            $amount = $row["amount"];
            require_once 'Product.inc.php';
            $product = new Product($id, $name, $description, $price, $brand, $amount); //, $image);
            $products[] = $product;
        }

        return $products;
    }

    public function getProduct($id) {
        $query = "SELECT * FROM product WHERE id = " . $id;
        $this->result = $this->conn->query($query);
        if ($this->result == null) {
            return;
        }
        while ($row = mysqli_fetch_array($this->result)) {
            $id = $row["id"];
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $brand = $row["brand"];
            $amount = $row["amount"];
            require_once 'Product.inc.php';
            $product = new Product($id, $name, $description, $price, $brand, $amount);
        }
        return $product;
    }

}
