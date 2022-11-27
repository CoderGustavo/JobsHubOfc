<?php

class UtilitiesController{
    protected $utilities, $table, $conn, $pk;

    public function __construct(){
        include_once ROOT."/Model/utilitiesTables.php";
        $this->utilities = new UtilitiesTables();
        $this->conn = $this->utilities->getConnection();
    }
    
    public function getHabilidadesEmAlta(){
        $query = $this->conn->prepare("SELECT a.id_ability , a.ability, COUNT(a.ability) AS qtd_each_abilities FROM vacancy_required_abilities vr
        LEFT JOIN vacancies v ON v.id_vacancy = vr.id_vacancy
        INNER JOIN abilities a ON vr.id_ability = a.id_ability
        GROUP BY a.id_ability
        ORDER BY qtd_each_abilities DESC
        LIMIT 20");
        $query->execute();

        return $query->fetchAll();
    }

    public function getVagasEmAlta(){
        $query = $this->conn->prepare("SELECT v.*, COUNT(uv.id_vacancy) AS qtd_vacancies FROM users_vacancies uv
        LEFT JOIN vacancies v ON v.id_vacancy = uv.id_vacancy
        GROUP BY uv.id_vacancy
        ORDER BY qtd_vacancies DESC
        LIMIT 20");
        $query->execute();

        $res = $query->fetchAll();

        foreach ($res as $key => $row) {
            $query1= $this->conn->prepare("SELECT * FROM vacancy_required_abilities v LEFT JOIN abilities a ON v.id_ability = a.id_ability WHERE id_vacancy = :id");
            $query1->bindParam(":id", $row["id_vacancy"]);
            $query1->execute();
            $res[$key]["vacancy_required_abilities"] = $query1->fetchAll();

            $query2= $this->conn->prepare("SELECT * FROM vacancy_difference_abilities v LEFT JOIN abilities a ON v.id_ability = a.id_ability WHERE id_vacancy = :id");
            $query2->bindParam(":id", $row["id_vacancy"]);
            $query2->execute();
            $res[$key]["vacancy_difference_abilities"] = $query2->fetchAll();

            $query3 = $this->conn->prepare("SELECT COUNT(*) AS qtd_max FROM users_vacancies WHERE id_vacancy=:id_vacancy");
            $query3->bindParam(":id_vacancy", $row["id_vacancy"]);
            $query3->execute();
            $res[$key]["qtd_total"] = $query3->fetchAll();
        }

        return $res;
    }
}