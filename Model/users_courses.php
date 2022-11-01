<?php

class  Users_Courses{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "users_courses";
        $this->pk = "id_users_courses";
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