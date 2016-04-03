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

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Database.inc.php");

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

    /**
     * Get all the categories
     * @return boolean|\Category
     */
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

    /**
     * Get child categories from category with id
     * @param type $catId
     * @return \Category
     */
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

    /**
     * Check if the category is unique
     * @param type $name
     * @param type $parent
     * @return type int (count)
     */
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

    /**
     * Check if category is unique (don't check the category himself)
     * @param type $id
     * @param type $name
     * @param type $parent
     * @return type int count
     */
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

    /**
     * Add category
     * @param type $name
     * @param type $description
     * @param null $parent
     * @return type int (id)
     */
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

    /**
     * Remove category (and subcategories if they exist)
     * @param type $id
     * @return boolean
     */
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

    /**
     * Remove subcategories
     * @param type $parent_id
     * @return boolean
     */
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

    /**
     * Edit category
     * @param type $id
     * @param type $name
     * @param type $description
     * @param null $parent
     * @return boolean
     */
    public function editCategory($id, $name, $description, $parent) {
        if ($parent === "") {
            $parent = NULL;
        }

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

}
