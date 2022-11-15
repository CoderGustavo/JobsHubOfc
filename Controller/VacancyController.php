<?php

use LDAP\Result;

class VacancyController{
    protected $vacancies, $table, $conn, $pk;

    public function __construct(){
        include_once ROOT."/Model/vacancy.php";
        $this->vacancy = new Vacancy();
        $this->conn = $this->vacancy->getConnection();
        $this->table = $this->vacancy->getTable();
        $this->pk = $this->vacancy->getPk();
    }
    
    public function updateInfos($userlogged, $infos, $id_vacancy){
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
        $query->bindParam(":$this->pk", $id_vacancy);
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
    
    public function selectInfos($re = true, $buscando = "", $campos = "*", $id = ""){
        $where = "";

        if($buscando && !$id) $where = "where name LIKE :buscando OR short_desc LIKE :buscando OR full_desc LIKE :buscando OR salary_min == :buscando OR salary_max == :buscando OR salary_defined == :buscando OR vacancy_type LIKE :buscando OR required_abilities LIKE :buscando OR difference_abilities LIKE :buscando OR workload LIKE :buscando OR activity LIKE :buscando OR qtd_max_cand == :buscando OR qtd_min_cand == :buscando OR open_date == :buscando OR close_date == :buscando";
        else if($id) $where = "where $this->pk = :$this->pk";

        $query = $this->conn->prepare("SELECT $campos FROM $this->table $where");

        if($buscando && !$id) $query->bindParam(":buscando", $buscando);
        else if($id) $query->bindParam(":$this->pk", $id);
        
        try {
            $query->execute();
            $res = $query->fetchAll();
            ($res);
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

    public function removeVacancy($id, $re = false){
        $query = $this->conn->prepare("DELETE FROM $this->table WHERE id_vacancy = :id");
        $query->bindParam(":id", $id);
        try {
            $query->execute();
            $res = array("success" => "Vaga removida com sucesso!");
            if($re){
                return $res;
            }else{
                echo json_encode($res);
                return;
            }
        }catch(Throwable $th){
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


