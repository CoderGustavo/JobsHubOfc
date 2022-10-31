<?php

class HomeController{

    function showHomePage(){
        $vagas = new VacancyController();
        $vagas = $vagas->selectInfos();
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
<<<<<<< HEAD
            $vaga=new VacancyController();
            $vaga=$vaga->selectInfos(true,"","*",$idvaga);
=======
            $vagas=new VacancyController();
            $vagas=$vagas->selectInfos(true,"","*",$idvaga);
            // print_r($vagas);
>>>>>>> feec3e3b860f6a97ecb280e7759cfebeac428fd1
        }

        require ROOT . '/View/hub/index.php';
    }

    function showCompanyPage(){
        $vagas = new VacancyController();
        $vagas = $vagas->selectInfos();
        require ROOT . '/View/company/index.php';
    }

    function showProfilePage(){
        $user = $_SESSION["user"];
        
        require ROOT . '/View/profile/index.php';
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
}
