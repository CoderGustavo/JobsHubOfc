<?php

class  Work_Experiences{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "work_experiences";
        $this->pk = "id_work_experiences";
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