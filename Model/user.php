<?php

class Users{
    protected $conn, $url, $table, $user, $pass, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "users";
        $this->pk = "id_user";
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