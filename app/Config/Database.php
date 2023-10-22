<?php

namespace App\Config;

use mysqli;

trait Database {
    private $localhost = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'students_management';
    public $conn = null;

    public function __construct() 
    {
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error) {
            die("Error connecting to database" . $this->conn->connect_error);
        }
    }
}