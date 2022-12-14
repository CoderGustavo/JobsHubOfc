<?php
session_start();
$path = explode("/", $_SERVER['REQUEST_URI']);
$request_method = $_SERVER['REQUEST_METHOD'];
define("PATH", $path);
define("ROOT", $_SERVER['DOCUMENT_ROOT']);

// include classes below:
require_once(__DIR__ . '/Controller/HomeController.php');
require_once(__DIR__ . '/Controller/UserController.php');
require_once(__DIR__ . '/Controller/VacancyController.php');
require_once(__DIR__ . '/Controller/VacancyDifferenceAbilityController.php');
require_once(__DIR__ . '/Controller/VacancyRequiredAbilityController.php');
require_once(__DIR__ . '/Controller/ResumeController.php');
require_once(__DIR__ . '/Controller/CompanyController.php');
require_once(__DIR__ . '/Controller/UtilitiesController.php');
require_once(__DIR__ . '/Controller/HabilityController.php');
require_once(__DIR__ . '/Controller/User_VacancyController.php');

// initialize classes below:
$home = new HomeController();
$user = new UserController();
$vacancies = new VacancyController();
$vacancyDif = new VacancyDifferenceAbilityController();
$vacancyReq = new VacancyRequiredAbilityController();
$resume = new ResumeController();
$cadEmpresa = new CompanyController();
$users_vancancies = new User_VacancyController();

switch (PATH[1]) {
    case "login" :
    case "cadastro" :
        if(!empty($_SESSION['user'])) header("Location: /");
        break;
    case "hub" :
        if(empty($_SESSION['user'])) header("Location: /login");
        break;
    // case "login" :
    // case "cadastro" :
    //     if(!$_SESSION['user']){
    //         header("Location: /");
    //     }
    //     break;
}
// print_r($_SESSION['user']);


switch (PATH[1]) {
    case '/' :
    case '' :
        $home->showHomePage();
        break;
    case 'login' :
        switch ($request_method){
            case 'GET' :
                $home->showLoginPage();
                break;
            case 'POST' :
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user->login($email, $password);
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'register' :
        switch ($request_method){
            case 'GET' :
                $home->showRegisterPage();
                break;
            case 'POST' :
                $email = $_POST['email'];
                $password = $_POST['password'];
                $con_password = $_POST['con_password'];
                $user->register($email, $password, $con_password);
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'buscando' :
        if(PATH[2]) require __DIR__ . '/View/search/index.php';
        else header('Location: /');
        break;
    case 'hub' :
        switch ($request_method){
            case 'GET' :
                if(PATH[2]){
                    $home->showHubPage(PATH[2]);
                }
                else{
                    $home->showHubPage();
                }
                break;
            case 'POST' :
                if(PATH[2]){
                    if(PATH[2]=='like'){
                        $_POST["id_user"] = $_SESSION["user"]["id_user"];
                        $users_vancancies->createInfos($_POST);
                    }
                }
                else{

                }
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'cadastrovaga' :
        switch ($request_method){
            case 'GET' :
                $home->showCadastroVaga();
                break;
            case 'POST' :
                switch (PATH[2]) {
                    case 1:
                        $vacancies->createInfos($_POST);
                        break;
                    case 2:
                        $vacancyDif->createInfos($_POST);
                        break;
                    case 3:
                        $vacancyReq->createInfos($_POST);
                        break;
                    default:
                        return json_encode(array("error" => "Tem o que fazer aqui n companheiro!"));
                        break;
                }
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'editarvaga' :
        switch($request_method){
            case 'GET' :
                PATH[2] ? $home->showEditVacancies(PATH[2]) : $home->redirect("/");;
                break;
            case 'POST' :
                $vacancies->updateInfos($_POST, $id_vacancy);
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'atualizarconta' :
        // print_r($_SESSION['user']);
        $user->updateInfos($_SESSION["user"], $_POST);
        break;
    case 'company' :
        switch ($request_method){
            case 'GET' :
                PATH[2] ? $home->showCompanyPage(PATH[2]) : $home->redirect("/");;
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'likes' :
        switch ($request_method){
            case 'GET' :
                $home->showLikesPage();
                break;
            case 'POST' :
                $vacancies->createInfos($_POST);
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'profile' :
        switch ($request_method){
            case 'GET' :
                $home->showProfilePage();
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'removerVaga' :
        switch ($request_method){
            case 'POST' :
                $vacancies->removeVacancy($_POST["id_vacancy"]);
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'resumes' :
        switch ($request_method){
            case 'GET' :
                require __DIR__ . '/View/resume/resume.php';
                break;
            case 'POST' :
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'cadastrocurriculo' :
        switch ($request_method){
            case 'GET' :
                $home->showCadastroCurriculo();
                break;
            case 'POST' :
                $resume->createInfos($_POST);
                break;
        }
        break;
    case 'cadastroempresa' :
        switch ($request_method){
            case 'GET' :
                $home->showCadastroEmpresa();
                break;
            case 'POST' :
                print_r($_POST);
                print_r($_POST["photo_profile"]);
                // $cadEmpresa->createInfos($_POST);
                break;
        }
        break;
    case 'logout':
            $user->logout();
        break;
    case 'teste':
        $buscando = "";
        $utilities->getVagarForMe($buscando);
        break;
    default:
        http_response_code(404);
        // require __DIR__ . '/View/404.php';
        break;
}
?>
