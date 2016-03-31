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

    public function checkIfCategoryIsUnique($name, $parent) {
        if ($this->establishConnection()) {
            if ($parent === "") {
                $sql = "SELECT COUNT(*) as cnt FROM category WHERE name = '" . $this->conn->real_escape_string($name) . "' AND category_id IS NULL";
            } else {
                $sql = "SELECT COUNT(*) as cnt FROM category WHERE name = '" . $this->conn->real_escape_string($name) . "' AND category_id = " . $this->conn->real_escape_string($parent);
            }

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
    
        public function checkIfCategoryIsUniqueWithId($id, $name, $parent) {
        if ($this->establishConnection()) {
            if ($parent === "") {
                $sql = "SELECT COUNT(*) as cnt FROM category WHERE name = '" . $this->conn->real_escape_string($name) . "' AND category_id IS NULL AND id <> " . $this->conn->real_escape_string($id);
            } else {
                $sql = "SELECT COUNT(*) as cnt FROM category WHERE name = '" . $this->conn->real_escape_string($name) . "' AND category_id = " . $this->conn->real_escape_string($parent) . " AND id <> " . $this->conn->real_escape_string($id);
            }

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

    public function addCategory($name, $description, $parent) {
        if ($this->establishConnection()) {
            if ($parent === "") {
                $parent = NULL;
            }

            $stmt = $this->conn->prepare("INSERT INTO category (id, name, description, category_id) VALUES (0, ?, ?, ?)");
            $stmt->bind_param('ssi', $name, $description, $parent);

            $stmt->execute();
            $generated_id = $stmt->insert_id;

            $this->closeConnection();

            return $generated_id;
        } else {
            return -1;
        }
    }

    public function removeCategory($id) {
        if ($this->removeSubcategories($id) == 1) {
            if ($this->establishConnection()) {
                $stmt = $this->conn->prepare("DELETE FROM category WHERE id = ?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $this->closeConnection();
                return true;
            } else {
                return false;
            }
        }
    }

    private function removeSubcategories($parent_id) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("DELETE FROM category WHERE category_id = ?");
            $stmt->bind_param('i', $parent_id);
            $stmt->execute();
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
            $stmt->execute();
            $this->closeConnection();
            return true;
        } else {
            return false;
        }
    }

    public function getChildCategoriesFromId($catId) {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM category WHERE category_id = " . $catId;

            $result = $this->conn->query($sql);

            if ($result == null) {
                return;
            }

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
        }
    }

}
