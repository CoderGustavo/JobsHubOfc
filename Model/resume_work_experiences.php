<?php

class  Resume_Work_Experiences{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "resume_work_experiences";
        $this->pk = "id_resume_scholarity";
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