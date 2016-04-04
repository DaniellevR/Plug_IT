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
 * Description of User
 *
 * @author Daniëlle
 */
class User extends Database {

    // User info
    public $username;
    public $password;
    public $firstname;
    public $prefix;
    public $lastname;
    public $email;
    public $telephonenumber;
    public $rolename;
    // Address of user
    public $addressId;
    public $streetname;
    public $housenumber;
    public $housenumber_suffix;
    public $city;
    public $postalCode;

    /**
     * Get all users with their address
     * @return \User|boolean
     */
    public function getUsers() {
        if ($this->establishConnection()) {
            $sql = "SELECT user.username, user.password, user.firstname, user.prefix, user.lastname, user.email, user.telephonenumber, user.role_name, "
                    . "address.address_id, address.streetname, address.housenumber, address.city, address.housenumber_suffix, address.postal_code "
                    . "FROM user INNER JOIN user_has_address ON user.username = user_has_address.user_username "
                    . "INNER JOIN address ON user_has_address.address_address_id = address.address_id";
            $result = $this->conn->query($sql);

            $users = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $user = new User();
                    $user->username = $row['username'];
                    $user->password = $row['password'];
                    $user->firstname = $row['firstname'];
                    $user->prefix = $row['prefix'];
                    $user->lastname = $row['lastname'];
                    $user->email = $row['email'];
                    $user->telephonenumber = $row['telephonenumber'];
                    $user->rolename = $row['role_name'];

                    $user->addressId = $row['address_id'];
                    $user->streetname = $row['streetname'];
                    $user->housenumber = $row['housenumber'];
                    $user->housenumber_suffix = $row['housenumber_suffix'];
                    $user->city = $row['city'];
                    $user->postalCode = $row['postal_code'];

                    $users[] = $user;
                }
            }

            $this->closeConnection();

            return $users;
        } else {
            return false;
        }
    }

    /**
     * Get password and role belonging to a username
     * @param type $username
     * @return string array (success) or empty string (fail)
     */
    public function loginCheck($username) {
        if ($this->establishConnection()) {
            $sql = "SELECT password, role_name FROM user WHERE username = '" . $this->conn->real_escape_string($username) . "'";
            $result = $this->conn->query($sql);

            $data = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row['password'];
                    $data[] = $row['role_name'];
                }
            }

            $this->closeConnection();

            return $data;
        } else {
            return "";
        }
    }

    /**
     * Add user
     * @param type $username
     * @param type $password
     * @param type $firstname
     * @param type $prefix
     * @param type $lastname
     * @param type $email
     * @param type $telephonenumber
     * @param type $rolename
     * @return int
     */
    public function addUser($username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO user (username, password, firstname, prefix, lastname, email, telephonenumber, role_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssssss', $username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename);

            $stmt->execute();

            $this->closeConnection();

            return 1;
        } else {
            return -1;
        }
    }

    /**
     * Connect user with address
     * @param type $username
     * @param type $addressId
     * @return int
     */
    public function connectUserWithAddress($username, $addressId) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO user_has_address (user_username, address_address_id) VALUES (?, ?)");
            $stmt->bind_param('si', $username, $addressId);

            $stmt->execute();

            $this->closeConnection();

            return 1;
        } else {
            return -1;
        }
    }

    /**
     * Disconnect user from address
     * @param type $username
     * @return boolean
     */
    public function disconnectUserFromAddresses($username) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("DELETE FROM user_has_address WHERE user_username = ?");
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $this->closeConnection();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get ids of addresses that are connected with the given username
     * @param type $username
     * @return array int (success) or boolean (fail)
     */
    public function getIdsAddresses($username) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("SELECT address_address_id FROM user_has_address WHERE user_username = ?");
            $stmt->bind_param('s', $username);
            $stmt->execute();

            $ids = array();
            $id = -1;

            $stmt->bind_result($id);

            while ($stmt->fetch()) { // For each row
                $ids[] = $id;
            }

            $this->closeConnection();

            return $ids;
        } else {
            return false;
        }
    }

    /**
     * Edit the user
     * @param type $username
     * @param type $password
     * @param type $firstname
     * @param type $prefix
     * @param type $lastname
     * @param type $email
     * @param type $telephonenumber
     * @param type $rolename
     * @return boolean
     */
    public function editUser($username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("UPDATE user SET password = ?, firstname = ?, prefix = ?, lastname = ?, email = ?, telephonenumber = ?, role_name = ? WHERE username = ?");
            $stmt->bind_param('ssssssss', $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename, $username);
            $stmt->execute();
            $this->closeConnection();
            return true;
        } else {
            return false;
        }
    }

}
