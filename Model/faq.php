<?php

class Faq{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "faq";
        $this->pk = "id_faq";
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