<?php

class UtilitiesTables{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->conn = new Connection();
        $this->conn = $this->conn->connection();
    }

    public function getConnection(){
        return $this->conn;
    }

}