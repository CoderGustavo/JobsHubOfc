<?php

class Feedback_Company{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "feedback_company";
        $this->pk = "id_feedback_company";
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