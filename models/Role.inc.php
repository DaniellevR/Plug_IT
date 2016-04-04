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

$root = "W:\Websites\TEMP\gaststudent99\Plug_IT";
require_once($root . "/models/Database.inc.php");

/**
 * Description of Role
 *
 * @author Daniëlle
 */
class Role extends Database {
    public $name;

    /**
     * Get all roles
     * @return \Role|boolean
     */
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
