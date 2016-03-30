<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Database.php");
require_once($root . "/Plug_IT/models/Address.php");

/**
 * Description of Supplier
 *
 * @author Daniëlle
 */
class Supplier extends Database {

    public $name;
    public $email;
    public $telephonenumber;
    public $addressId;
    public $streetname;
    public $housenumber;
    public $housenumber_suffix;
    public $city;
    public $postalCode;

    public function getSuppliers() {
        if ($this->establishConnection()) {
            $sql = "SELECT supplier.name, supplier.email, supplier.telephonenumber, address.address_id, address.streetname, address.housenumber, "
                    . "address.city, address.housenumber_suffix, address.postal_code FROM supplier INNER JOIN address ON supplier.address_address_id = address.address_id";
            $result = $this->conn->query($sql);

            $suppliers = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $supplier = new Supplier();
                    $supplier->name = $row['name'];
                    $supplier->email = $row['email'];
                    $supplier->telephonenumber = $row['telephonenumber'];
                    $supplier->addressId = $row['address_id'];
                    $supplier->streetname = $row['streetname'];
                    $supplier->housenumber = $row['housenumber'];
                    $supplier->housenumber_suffix = $row['housenumber_suffix'];
                    $supplier->city = $row['city'];
                    $supplier->postalCode = $row['postal_code'];
                    $suppliers[] = $supplier;
                }
            }

            $this->closeConnection();

            return $suppliers;
        } else {
            return false;
        }
    }

    public function checkIfSupplierExists($name) {
        if ($this->establishConnection()) {
            $sql = "SELECT COUNT(*) as cnt FROM supplier WHERE name = '" . $this->conn->real_escape_string($name) . "'";

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

    public function addSupplier($name, $addressId, $email, $telephonenumber) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO supplier (name, address_address_id, email, telephonenumber) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('siss', $name, $addressId, $email, $telephonenumber);

            $stmt->execute();
            $generated_id = $stmt->insert_id;

            $this->closeConnection();

            return $generated_id;
        } else {
            return -1;
        }
    }

}
