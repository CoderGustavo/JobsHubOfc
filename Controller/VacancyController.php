<?php

class VacancyController{
    protected $vacancy, $table;

    public function __construct(){
        include ROOT."/Model/vacancy.php";
        $this->vacancy = new Vacancy();
        $this->conn = $this->vacancy->getConnection();
        $this->table = $this->vacancy->getTable();
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

        $query = $this->conn->prepare("UPDATE vacancies SET ". $a ." WHERE id_vacancy = :id_vacancy");
        // $query->bindParam(":id", $userlogged["id_user"]);
        $query->bindParam(":id_vacancy", $id_vacancy);
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
            $res = array("success" => "Alterações realizadas com sucesso!");
            echo json_encode($res);
            return;
        } catch (Throwable $th) {
            $res = array("error" => $th);
            echo json_encode($res);
            return;
        }
        
    }
    
    public function selectInfos($buscando){
        $where = "";

        if($buscando) $where = "where name LIKE :buscando OR short_desc LIKE :buscando OR full_desc LIKE :buscando OR salary_min == :buscando OR salary_max == :buscando OR salary_defined == :buscando OR vacancy_type LIKE :buscando OR required_abilities LIKE :buscando OR difference_abilities LIKE :buscando OR workload LIKE :buscando OR activity LIKE :buscando OR qtd_max_cand == :buscando OR qtd_min_cand == :buscando OR open_date == :buscando OR close_date == :buscando";

        $query = $this->conn->prepare("SELECT * FROM $this->table $where");

        if($buscando) $query->bindParam(":buscando", $buscando);

        try {
            $query->execute();
            $res = $query->fetchAll();
            echo json_encode($res);
            return;
        } catch (Throwable $th) {
            $res = array("error" => $th);
            echo json_encode($res);
            return;
        }
        
    }

}


