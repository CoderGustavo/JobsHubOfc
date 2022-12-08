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

    public function getVagasForMe(){
        $selectVagas = $this->conn->prepare("SELECT * FROM vacancies
        LEFT JOIN users_vacancies
        ON users_vacancies.id_vacancy = vacancies.id_vacancy
        WHERE users_vacancies.id_user <> :id_user OR users_vacancies.id_user IS NULL");
        $selectVagas->bindParam(":id_user", $_SESSION["user"]["id_user"]);
        $selectVagas->execute();
        $res1 = $selectVagas->fetchAll();

        $matchCounter = 0;
        $vagaCounter = 0;
        $vagasMatched = array();
        $vagaAdded = false;

        $selectMyAbilities = $this->conn->prepare("SELECT a.id_ability FROM resumes_abilities ra
        INNER JOIN resumes r
        ON ra.id_resume= r.id_resume
        INNER JOIN abilities a
        ON ra.id_ability= a.id_ability
        WHERE id_user = :id_user");
        $selectMyAbilities->bindParam(":id_user", $_SESSION["user"]["id_user"]);
        $selectMyAbilities->execute();
        $res2 = $selectMyAbilities->fetchAll();

        foreach ($res1 as $key => $vaga) {
            $selectAbilitiesFromVaga = $this->conn->prepare("SELECT v.id_vacancy, a.id_ability FROM vacancy_required_abilities vra
            INNER JOIN vacancies v
            ON vra.id_vacancy = v.id_vacancy
            INNER JOIN abilities a
            ON vra.id_ability = a.id_ability
            WHERE vra.id_vacancy = :id_vacancy");
            $selectAbilitiesFromVaga->bindParam(":id_vacancy", $res1[$key]['id_vacancy']);
            $selectAbilitiesFromVaga->execute();
            $res3 = $selectAbilitiesFromVaga->fetchAll();

            foreach ($res3 as $key => $abilityVaga) {
                foreach ($res2 as $key => $abilityUser) {
                    if($abilityVaga['id_ability'] == $abilityUser['id_ability']){
                        $matchCounter+= 1;
                    }
                }
                $vagaCounter += 1;
                $matchCounter = 0;
            }
            echo $matchCounter;
            echo "<br>";
            echo $vagaCounter;
            $math = ($matchCounter/$vagaCounter)*100;
            if($math > 80 && !$vagaAdded){
                array_push($vagasMatched, $res1);
                $vagaAdded = true;
            }

            $vagaCounter = 0;
        }

        print_r($vagasMatched);






    }
}
