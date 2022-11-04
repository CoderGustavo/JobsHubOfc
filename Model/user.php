<?php

class Users{
    protected $conn, $url, $table, $user, $pass;

    public function __construct(){
        include_once "connection.php";
        $this->table = "users";
        $this->conn = new Connection();
        $this->conn = $this->conn->connection();
    }

    public function getConnection(){
        return $this->conn;
    }


    public function getTable(){
        return $this->table;
    }

}