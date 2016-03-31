<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Database.php");

/**
 * Description of Product
 *
 * @author Daniëlle
 */
class Product extends Database {

    public $id;
    public $name;
    public $shortDescription;
    public $description;
    public $characteristics;
    public $price;
    public $brand;
    public $supplier;
    public $amount;
    public $categoryId;

    public function getProducts() {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM products";
            $result = $this->conn->query($sql);

            $products = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product = new Product();
                    $product->id = $row['id'];
                    $product->name = $row['name'];
                    $product->shortDescription = $row['short_description'];
                    $product->description = $row['description'];
                    $product->characteristics = $row['characteristics'];
                    $product->price = $row['price'];
                    $product->brand = $row['brand'];
                    $product->supplier = $row['supplier_name'];
                    $product->amount = $row['amount'];
                    $product->categoryId = $row['category_id'];
                    $products[] = $product;
                }
            }

            $this->closeConnection();

            return $products;
        } else {
            return false;
        }
    }
    
    public function getProductsFromCategoryId($catId) {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM product WHERE category_id = " . $catId;

            $result = $this->conn->query($sql);

            if ($result == null) {
                return;
            }

            $products = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product = new Product();
                    $product->id = $row['id'];
                    $product->name = $row['name'];
                    $product->description = $row['description'];
                    $product->price = $row['price'];
                    $product->brand = $row['brand'];
                    $product->supplier = $row['supplier_name'];
                    $product->amount = $row['amount'];
                    $product->category_id = $row['category_id'];
                    $products[] = $product;
                }
            }

            $this->closeConnection();

            return $products;
        }
    }

    public function getProductsInCategory($categoryId) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("SELECT * FROM product WHERE category_id = ?");
            $stmt->bind_param('i', $categoryId);
            $stmt->execute();

            $products = array();

            $stmt->bind_result($this->id, $this->name, $this->shortDescription, $this->description, $this->characteristics, $this->price, $this->brand, $this->supplier, $this->amount, $this->categoryId);

            while ($stmt->fetch()) { // For each row
//                $products[] = $this;
                $product = new Product();
                $product->id = $this->id;
                $product->name = $this->name;
                $product->shortDescription = $this->shortDescription;
                $product->description = $this->description;
                $product->characteristics = $this->characteristics;
                $product->price = $this->price;
                $product->brand = $this->brand;
                $product->supplier = $this->supplier;
                $product->amount = $this->amount;
                $product->categoryId = $this->categoryId;
                $products[] = $product;
            }

            $this->closeConnection();

            return $products;
        } else {
            return false;
        }
    }

    public function checkIfProductIsUnique($name, $supplier) {
        if ($this->establishConnection()) {
            $sql = "SELECT COUNT(*) as cnt FROM product WHERE name = '" . $this->conn->real_escape_string($name) . "' AND supplier_name = '" . $this->conn->real_escape_string($supplier) . "'";
            $result = $this->conn->query($sql);

            $count = -1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $count = $row['cnt'];
                }
            }

            $this->closeConnection();

            return $count;
        } else {
            return -1;
        }
    }

    public function getProduct($productId) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("SELECT * FROM product WHERE id = ?");
            $stmt->bind_param('i', $productId);
            $stmt->execute();

            $stmt->bind_result($this->id, $this->name, $this->shortDescription, $this->description, $this->characteristics, $this->price, $this->brand, $this->supplier, $this->amount, $this->categoryId);
            $stmt->fetch();

            $this->closeConnection();

            return $this;
        } else {
            return false;
        }
    }

    public function addProduct($name, $shortDescription, $description, $characteristics, $price, $brand, $supplier, $amount, $categoryId) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO product (id, name, short_description, description, characteristics, price, brand, supplier_name, amount, category_id) VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssdssii', $name, $shortDescription, $description, $characteristics, $price, $brand, $supplier, $amount, $categoryId);

            $stmt->execute();
            $generated_id = $stmt->insert_id;

            $this->closeConnection();

            return $generated_id;
        } else {
            return -1;
        }
    }

    public function removeProduct($id) {
        if ($this->removeSubcategories($id) == 1) {
            if ($this->establishConnection()) {
                $stmt = $this->conn->prepare("DELETE FROM product WHERE id = ?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $this->closeConnection();
                return true;
            } else {
                return false;
            }
        }
    }

}
