<?php

class Classr{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "classr";
        $this->pk = "id_classr";
        $this->conn = new Connection();
        $this->conn = $this->conn->connection();
    }

    public function getConnection(){
        return $this->conn;
    }


    public function getTable(){ 
        return $this->table;
    }

    public function getPk(){ 
        return $this->pk;
    }

}