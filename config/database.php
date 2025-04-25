<?php

class Database {
    // Database connection parameters
    private $host = "localhost";     // Hostname of the database server
    private $db_name = "PMS";        // Name of the database
    private $username = "root";      // Database username
    private $password = "";          // Database password
    public $conn;                    // Public variable to hold the database connection

    /**
     * Establish a connection to the database using PDO.
     *
     * @return PDO|null - Returns the PDO connection object on success, or null on failure.
     */
    public function connect() {
        $this->conn = null; // Initialize connection as null

        try {
            // Attempt to establish a new PDO connection with UTF-8 character set
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            // Catch and display any connection errors
            echo "Connection error: " . $e->getMessage();
        }

        // Return the connection (could be null if connection failed)
        return $this->conn;
    }
}
