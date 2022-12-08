<?php

class CompanyController{
    protected $company, $table, $conn, $pk;

    public function __construct(){
        include_once ROOT."/Model/company.php";
        $this->company = new Company();
        $this->conn = $this->company->getConnection();
        $this->table = $this->company->getTable();
        $this->pk = $this->company->getPk();
    }

    public function updateInfos($userlogged, $infos, $id_company){
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
        $query->bindParam(":$this->pk", $id_company);
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

    public function selectInfos($re = true, $campos = "*", $empresa = ""){

        if($empresa){
            $empresa = implode(" ", explode("-", trim($empresa)));

            $queryEmpExist = $this->conn->prepare("SELECT $campos FROM companies WHERE NAME LIKE :name");
            $queryEmpExist->bindParam(":name", $empresa);
            $queryEmpExist->execute();

            $queryEmp = $this->conn->prepare("SELECT $campos FROM companies WHERE id_company=:id");
            $queryEmp->bindParam(":id", $queryEmpExist->fetch()["id_company"]);
            $queryEmp->execute();

            $res = $queryEmp->fetch();

            if(empty($res)) header("location: /");

            if($queryEmp->errorInfo()["2"]){
                $res = array("error" => $queryEmp->errorInfo()["2"]);
                echo json_encode($res);
                return;
            }
            if($re){
                return $res;
            }else{
                echo json_encode($res);
                return;
            }



        }

    }
}


