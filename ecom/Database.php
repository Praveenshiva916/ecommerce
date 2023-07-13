<?php
require_once 'config.php';
class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die('Database connection failed: ' . $this->conn->connect_error);
        }
    }

    public function executeQuery($query)
    {
        return $this->conn->query($query);
    }
}
?>
