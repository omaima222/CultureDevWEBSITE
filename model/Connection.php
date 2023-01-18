<?php


class Connection{

    private string $localhost = "localhost";
    private string $username = "root";
    private string $db_password = "";
    private string $db_name = "culturedev";

    protected function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->localhost;dbname=$this->db_name", $this->username, $this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return $e;
        }
    }
}















?>