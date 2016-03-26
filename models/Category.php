<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Database.php");
//require_once('models/database.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author Daniëlle
 */
class Category extends Database {

    public $id;
    public $name;
    public $description;
    public $parent;

    public function getCategories() {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM category";
            $result = $this->conn->query($sql);

            $categories = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $category = new Category();
                    $category->id = $row['id'];
                    $category->name = $row['name'];
                    $category->description = $row['description'];
                    $category->parent = $row['category_id'];
                    $categories[] = $category;
                }
            }

            $this->closeConnection();

            return $categories;
        } else {
            return false;
        }
    }

    public function addCategory($name, $description, $parent) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO category (id, name, description, category_id) VALUES (0, ?, ?, ?)");
            $stmt->bind_param('ssi', $name, $description, $parent);

            $stmt->execute();
            $generated_id = $stmt->insert_id;

            $this->closeConnection();

            return $generated_id;
        } else {
            return false;
        }
    }

    public function removeCategory($id) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("DELETE FROM category WHERE id = ?");
            $stmt->bind_param('i', $id);

            $this->closeConnection();

            return true;
        } else {
            return false;
        }
    }

    public function removeSubcategories($parent_id) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("DELETE FROM category WHERE category_id = ?");
            $stmt->bind_param('i', $parent_id);

            $this->closeConnection();

            return true;
        } else {
            return false;
        }
    }

    public function editCategory($id, $name, $description, $parent) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("UPDATE category SET name = ?, description = ?, category_id = ? WHERE id = ?");
            $stmt->bind_param('ssii', $name, $description, $parent, $id);

            $this->closeConnection();

            return true;
        } else {
            return false;
        }
    }

}
