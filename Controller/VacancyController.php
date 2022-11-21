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
    
    public function selectInfos($re = true, $buscando = "", $campos = "*", $id = "", $user = "", $empresa = ""){
        if($empresa){
            $empresa = implode(" ", explode("-", trim($empresa)));

            $queryEmpExist = $this->conn->prepare("SELECT * FROM companies WHERE NAME LIKE :name");
            $queryEmpExist->bindParam(":name", $empresa);
            $queryEmpExist->execute();

            $queryEmp = $this->conn->prepare("SELECT * FROM companies WHERE id_company=:id");
            $queryEmp->bindParam(":id", $queryEmpExist->fetch()["id_company"]);
            $queryEmp->execute();
            if(!$queryEmp->fetch()) header("location: /");
        }
        
        $where = "";
        
        $whereUser = "JOIN users_vacancies on vacancies.$this->pk = users_vacancies.$this->pk WHERE users_vacancies.id_user = :id_user";
        $whereEmpresa = "WHERE id_company = :id_company";

        if($buscando && !$id) $where = "where name LIKE :buscando OR short_desc LIKE :buscando OR full_desc LIKE :buscando OR salary_min == :buscando OR salary_max == :buscando OR salary_defined == :buscando OR vacancy_type LIKE :buscando OR required_abilities LIKE :buscando OR difference_abilities LIKE :buscando OR workload LIKE :buscando OR activity LIKE :buscando OR qtd_max_cand == :buscando OR qtd_min_cand == :buscando OR open_date == :buscando OR close_date == :buscando";
        else if($id) $where = "where $this->pk = :$this->pk";
        else if($user) $where = $whereUser;
        else if($empresa) $where = $whereEmpresa;
        
        $query = $this->conn->prepare("SELECT $campos FROM $this->table $where");
        
        if($buscando && !$id) $query->bindParam(":buscando", $buscando);
        else if($id) $query->bindParam(":$this->pk", $id);
        else if($user) $query->bindParam(":id_user", $user["id_user"]);
        else if($empresa) $query->bindParam(":id_company", $empresa);
        
        try {
            $query->execute();
            $res = $query->fetchAll();
            
            foreach ($res as $key => $row) {
                $query1= $this->conn->prepare("SELECT * FROM vacancy_required_abilities v LEFT JOIN abilities a ON v.id_ability = a.id_ability WHERE $this->pk = :id");
                $query1->bindParam(":id", $row[$this->pk]);
                $query1->execute();
                $res[$key]["vacancy_required_abilities"] = $query1->fetchAll();

                $query2= $this->conn->prepare("SELECT * FROM vacancy_difference_abilities v LEFT JOIN abilities a ON v.id_ability = a.id_ability WHERE $this->pk = :id");
                $query2->bindParam(":id", $row[$this->pk]);
                $query2->execute();
                $res[$key]["vacancy_difference_abilities"] = $query2->fetchAll();

                $query3 = $this->conn->prepare("SELECT COUNT(*) AS qtd_max FROM users_vacancies WHERE $this->pk=:$this->pk");
                $query3->bindParam(":$this->pk", $row[$this->pk]);
                $query3->execute();
                $res[$key]["qtd_total"] = $query3->fetchAll();
            }

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


