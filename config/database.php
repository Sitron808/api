<?php

$host = "localhost";
$db_name = "api";
$username = "root";
$password = "root";
$conn = null;

function getConnection() {
    try {
        if ($this->conn === null) {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->exec("set names utf8");
        }
        return $this->conn;
    } catch(PDOException $e) {
        echo "Connection error: " . $e->getMessage();
        return null;
    }
}
