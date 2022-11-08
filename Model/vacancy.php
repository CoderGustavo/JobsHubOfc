<?php

<<<<<<< HEAD:Model/vacancy.php
class Vacancy{
=======
<<<<<<< HEAD:Model/vacancy.php
class Vacancy{
    protected $conn, $table, $pk ;
    public function __construct(){
        include_once "connection.php";
        $this->table = "vacancies";
        $this->pk = "id_vancancy"; 
=======
class Vacancies{
>>>>>>> d4ec1a72c7bda77afa9512aed85a63c71d6937e4:Model/vacancies.php
    protected $conn, $table, $pk;

    public function __construct(){
        include_once "connection.php";
        $this->table = "vacancy";
        $this->pk = "id_vacancy";
>>>>>>> 0637d7fbf2affc4f9b7cf354b93cb667ab8a344e:Model/vacancies.php
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