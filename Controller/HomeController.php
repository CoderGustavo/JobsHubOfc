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

        $path= PATH;
        
        if($idvaga){
            $vagas=new VacancyController();
            $vagas=$vagas->selectInfos(true,"","*",$idvaga);
            // print_r($vagas);
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
    
    function showEditVacancies($id){
        $vagas = new VacancyController();
        $vagas = $vagas->selectInfos($re = true, "", "*", $id);
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
