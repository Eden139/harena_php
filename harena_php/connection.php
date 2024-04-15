<?php
class Connection {
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect("localhost", "root", "sudo", "harena");

        if (!$this->connection) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $CREATE_TABLE_SQL = "CREATE TABLE IF NOT EXISTS transactions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            type VARCHAR(10) NOT NULL,
            description TEXT NOT NULL,
            amount DECIMAL(10,2) NOT NULL,
            date DATE NOT NULL
        );";


        mysqli_query($this->connection, $CREATE_TABLE_SQL);
    }

    public function getConnection() {
        return $this->connection;
    }
}

?>