<?php

class Feedback_Vacancy{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "feedback_vacancy";
        $this->pk = "id_feedback_vacancy";
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