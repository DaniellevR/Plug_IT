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

/**
 * Description of Database
 *
 * @author Daniëlle
 */
class Database {
    public $conn;

    /**
     * Make connection with the database
     * @return boolean
     */
    public function establishConnection() {
        $servername = "sql7.freemysqlhosting.net";
        $username = "sql7113415";
        $password = "dNMJpgPLG4";
        $database = "sql7113415";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->conn->connect_error) {
            return false;
        }
        return true;
    }
    
    /**
     * Close the connection with the database
     */
    public function closeConnection() {
        mysqli_close($this->conn);
    }
}
