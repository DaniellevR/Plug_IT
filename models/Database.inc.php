<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author Daniëlle
 */
class Database {
    public $conn;

    public function establishConnection() {
        $servername = "sql7.freemysqlhosting.net";
        $username = "sql7111397";
        $password = "C1Axh5jdE9";
        $database = "sql7111397";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($this->conn->connect_error) {
            return false;
        }
        return true;
    }
    
    public function closeConnection() {
        mysqli_close($this->conn);
    }
}
