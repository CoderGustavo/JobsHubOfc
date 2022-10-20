<?php

class Vacancy{
    protected $conn, $table;

    public function __construct(){
        include_once "connection.php";
        $this->table = "vacancies";
        $this->conn = new Connection();
        $this->conn = $this->conn->connection();
    }

    public function getConnection(){
        return $this->conn;
    }


    public function getTable(){
        return $this->table;
    }

}