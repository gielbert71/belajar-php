<?php
class Database {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('127.0.0.1', 'root', '', 'pos_shop');

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
