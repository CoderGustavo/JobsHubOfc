<?php

class CompaniesController{
    protected $companies, $table, $conn, $pk;

    public function __construct(){
        include_once ROOT."/Model/companies.php";
        $this->companies = new Companies();
        $this->conn = $this->companies->getConnection();
        $this->table = $this->companies->getTable();
        $this->pk = $this->companies->getPk();
    }
    
    public function updateInfos($userlogged, $infos, $id_companies){
        $a = "";
        $index = 1;

        foreach ($infos as $key => $info) {
            if(count($infos) != $index){
                $a .= "$key = :$key, ";
            }else{
                $a .= "$key = :$key";
            }
            $index++;
        }

        $query = $this->conn->prepare("UPDATE $this->table SET ". $a ." WHERE $this->pk = :$this->pk");
        // $query->bindParam(":id", $userlogged["id_user"]);
        $query->bindParam(":$this->pk", $id_companies);
        $index = 1;
        foreach ($infos as $key => $info) {
            $query->bindParam(":$key", $infos[$key]);
            $index++;
        }
        try {
            $query->execute();
            $res = array("success" => "Alterações realizadas com sucesso!");
            echo json_encode($res);
            return;
        } catch (Throwable $th) {
            $res = array("error" => $th);
            echo json_encode($res);
            return;
        }
        
    }

    public function createInfos($infos){
        $a = "";
        $b = "";
        $index = 1;

        foreach ($infos as $key => $info) {
            if(count($infos) != $index){
                $a .= "$key, ";
                $b .= ":$key, ";
            }else{
                $a .= "$key";
                $b .= ":$key";
            }
            $index++;
        }

        $query = $this->conn->prepare("INSERT INTO $this->table ($a) VALUES ($b)");
        // $query->bindParam(":id", $userlogged["id_user"]);
        $index = 1;
        foreach ($infos as $key => $info) {
            $query->bindParam(":$key", $infos[$key]);
            $index++;
        }
        try {
            $query->execute();
            $res = array("success" => "Dados criados com sucesso!");
            echo json_encode($res);
            return;
        } catch (Throwable $th) {
            $res = array("error" => $th);
            echo json_encode($res);
            return;
        }
        
    }
    
    public function selectInfos($re = true, $campos = "*", $id = ""){
        $where = "";

        if($id) $where = "where $this->pk = :$this->pk";

        $query = $this->conn->prepare("SELECT $campos FROM $this->table $where");

        if($id) $query->bindParam(":$this->pk", $id);
        
        try {
            $query->execute();
            $res = $query->fetchAll();
            if($re){
                return $res;
            }else{
                echo json_encode($res);
                return;
            }
        } catch (Throwable $th) {
            $res = array("error" => $th);
            if($re){
                return $res;
            }else{
                echo json_encode($res);
                return;
            }
        }
        
    }

}


