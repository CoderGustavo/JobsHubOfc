<?php
class Connection{

    protected $urldb, $dbname, $usernamedb, $passworddb;

    public function __construct(){
        $this->urldb = "localhost";
        $this->dbname = "jobshub";
        $this->usernamedb = "root";
        $this->passworddb = "";
    }

    public function connection(){
        $conn = new PDO("mysql:host=$this->urldb;dbname=$this->dbname", $this->usernamedb, $this->passworddb);
        return $conn;
    }
}