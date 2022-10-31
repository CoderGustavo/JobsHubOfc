<?php

class  Selective_Process{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "selective_process";
        $this->pk = "id_selective_process";
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
        return $this->table;
    }

}