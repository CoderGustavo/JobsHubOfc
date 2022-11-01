<?php

class  Users_Vacancies{
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "users_vacancies";
        $this->pk = "id_users_vacancies";
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