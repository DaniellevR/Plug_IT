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
            $sql = "SELECT * FROM address";
            $result = $this->conn->query($sql);

            $addresses = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $address = new Address();
                    $address->id = $row['address_id'];
                    $address->streetname = $row['streetname'];
                    $address->housenumber = $row['housenumber'];
                    $address->city = $row['city'];
                    $address->housenumberSuffix = $row['housenumber_suffix'];
                    $address->postalCode = $row['postal_code'];
                    $addresses[] = $address;
                }
            }

            $this->closeConnection();

            return $addresses;
        } else {
            return false;
        }
    }
    
    public function addAddress($streetname, $housenumber, $city, $housenumberSuffix, $postalCode) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO address (address_id, streetname, housenumber, city, housenumber_suffix, postal_code) VALUES (0, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sisss', $streetname, $housenumber, $city, $housenumberSuffix, $postalCode);

            $stmt->execute();
            $generated_id = $stmt->insert_id;

            $this->closeConnection();

            return $generated_id;
        } else {
            return -1;
        }
    }
}