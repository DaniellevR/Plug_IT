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
 * Description of Role
 *
 * @author Daniëlle
 */
class Role extends Database {
    public $name;

    public function getRoles() {
        if ($this->establishConnection()) {
            $sql = "SELECT * FROM role";
            $result = $this->conn->query($sql);

            $roles = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $role = new Role();
                    $role->name = $row['name'];
                    $roles[] = $role;
                }
            }

            $this->closeConnection();

            return $roles;
        } else {
            return false;
        }
    }
}
