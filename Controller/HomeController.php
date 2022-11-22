<?php

class HomeController{


    function showHomePage(){
        $vagas = new VacancyController();
        $utilities = new UtilitiesController();

        $vagas = $vagas->selectInfos();

        $habilidadesEmAlta = $utilities->getHabilidadesEmAlta();

        $vagasEmAlta = $utilities->getVagasEmAlta();

        require ROOT . '/View/home/index.php';
    }

    function showRegisterPage(){
        require ROOT . '/View/register/index.php';
    }
    
    function showLoginPage(){
        require ROOT . '/View/login/index.php';
    }

    function showHubPage($idvaga=""){
        
        if($idvaga){
            $vagas = new VacancyController();
            $vaga = $vagas->selectInfos(true,"","*",$idvaga);
        }


        require ROOT . '/View/hub/index.php';
    }

    function showCompanyPage(){
        // $vagas = new VacancyController();
        // $vagas = $vagas->selectInfos(true, "", "*", "", "", PATH[2]);
        require ROOT . '/View/company/index.php';
    }

    function showProfilePage(){
        $user = $_SESSION["user"];
        
        require ROOT . '/View/profile/index.php';
    }

    function showLikesPage(){
        $vagas = new VacancyController();
        $utilities = new UtilitiesController();

        $vagas = $vagas->selectInfos(true, "", "*", "", $_SESSION["user"]);

        $habilidadesEmAlta = $utilities->getHabilidadesEmAlta();

        require ROOT . '/View/likes/index.php';
    }
    
    function showEditVacancies(){
       
        $vagas = new VacancyController();
<<<<<<< HEAD
        $vagas = $vagas->selectInfos($re = true, "", "*", $id = "");
=======
        $vagas = $vagas->selectInfos(true, "", "*", $id);
>>>>>>> 804b5f0cdb1545ad18a99fef0711548157636717
        $vaga = $vagas[0];
        require ROOT . '/View/editarVaga/editarVaga.php';
    }

    function showCadastroCurriculo(){
        require_once(ROOT . '/View/home/index.php');
    }

    function showCadastroEmpresa(){
        require_once(ROOT . '/View/cadEmpresa/index.php');
    }

    function showError($error_code){
        switch($error_code){
            case 404:
                break;
            case 405:
                break;
            default:
                break;
        }
    }

    function redirect($local){
        header("location: $local");
    }
}
