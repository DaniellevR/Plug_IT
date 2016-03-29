<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once($root . "/Plug_IT/models/Database.php");

/**
 * Description of User
 *
 * @author Daniëlle
 */
class User extends Database {

    public $username;
    public $password;
    public $firstname;
    public $prefix;
    public $lastname;
    public $email;
    public $telephonenumber;
    public $rolename;

    public function checkIfUsernameExists($username) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("SELECT username FROM user WHERE username = ?");
            $stmt->bind_param('s', $username);
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

    public function addUser($username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename) {
        if ($this->establishConnection()) {
            $stmt = $this->conn->prepare("INSERT INTO user (username, password, firstname, prefix, lastname, email, telephonenumber, role_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssssss', $username, $password, $firstname, $prefix, $lastname, $email, $telephonenumber, $rolename);

            $stmt->execute();
            $generated_id = $stmt->insert_id;

            $this->closeConnection();

            return $generated_id;
        } else {
            return -1;
        }
    }

}
