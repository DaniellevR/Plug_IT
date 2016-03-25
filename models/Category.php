<?php

require_once('models/database.php');
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
            $stmt = $dbh->prepare("INSERT INTO category (id, name, description, category_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindParam(1, 0);
            $stmt->bindParam(2, $name);
            $stmt->bindParam(3, $description);
            $stmt->bindParam(4, $parent);

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
            $stmt = $dbh->prepare("DELETE FROM category WHERE id = ?");
            $stmt->bindParam(1, $id);

            $this->closeConnection();

            return true;
        } else {
            return false;
        }
    }

    public function removeSubcategories($parent_id) {
        if ($this->establishConnection()) {
            $stmt = $dbh->prepare("DELETE FROM category WHERE category_id = ?");
            $stmt->bindParam(1, $parent_id);

            $this->closeConnection();

            return true;
        } else {
            return false;
        }
    }

    public function editCategory($id, $name, $description, $parent) {
        if ($this->establishConnection()) {
            $stmt = $dbh->prepare("UPDATE category SET name = ?, description = ?, category_id = ? WHERE id = ?");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $parent);
            $stmt->bindParam(4, $id);

            $this->closeConnection();

            return true;
        } else {
            return false;
        }
    }

    public function getChildCategoriesFromId($catId) {
        $this->db->select('*')->from('product')->where('category', $catId);
        $result = $this->db->get();
        if ($result == null) {
            return;
        }
        $categories = array();
        foreach ($result->result() as $row) {
            $category = new Category();
            $category->id = $row->id;
            $category->name = $row->name;
            $category->description = $row->description;
            $category->price = $row->price;
            $category->brand = $row->brand;
            $category->supplier = $row->supplier;
            $category->amount = $row->amount;
            $category->category_id = $row->category_id;
            $categories[] = $category;
        }

        return $categories;
    }

}
