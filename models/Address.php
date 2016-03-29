<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Database.php");

/**
 * Description of Address
 *
 * @author Daniëlle
 */
class Address extends Database {

    public $id;
    public $streetname;
    public $housenumber;
    public $city;
    public $housenumberSuffix;
    public $postalCode;

    public function getAddresses() {
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
    
    public function checkIfAddressExists($streetname, $housenumber, $city, $housenumber_suffix, $postal_code) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("SELECT streetname FROM address WHERE streetname = ?, housenumber = ?, city = ?, housenumber_suffix = ?, postal_code = ?");
            $stmt->bind_param('sisss', $streetname, $housenumber, $city, $housenumber_suffix, $postal_code);
            $stmt->execute();
            
            $name = "";
            
            $stmt->bind_result($name);
            $stmt->fetch();

            $this->closeConnection();
            
            return $name;
        } else {
            return -1;
        }
    }

    public function addAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO address (address_id, streetname, housenumber, city, housenumber_suffix, postal_code) VALUES (0, ?, ?, ?, ?, ?)");
            $stmt->bind_param('isisss', $name, $description, $parent);

            $stmt->execute();
            $generated_id = $stmt->insert_id;

            $this->closeConnection();

            return $generated_id;
        } else {
            return -1;
        }
    }
}
