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
require_once(__DIR__ . '/Controller/ResumeController.php');
require_once(__DIR__ . '/Controller/CompanyController.php');
require_once(__DIR__ . '/Controller/UtilitiesController.php');

// initialize classes below:
$home = new HomeController();
$user = new UserController();
$vacancies = new VacancyController();
$resume = new ResumeController();
$cadEmpresa = new CompanyController();

switch (PATH[1]) {
    case "login" :
    case "cadastro" :
        if(!empty($_SESSION['user'])) header("Location: /");
        break;
    // case "login" :
    // case "cadastro" :
    //     if(!$_SESSION['user']){
    //         header("Location: /");
    //     }
    //     break;
}


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
                        $_POST["id_user"]=$_SESSION["user"]["id_user"];
                        $users_vancancies->createInfos($_POST);
                    }
                    else{

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
                require __DIR__ . '/View/cadVaga/cadvaga.php';
                break;
            case 'POST' :
                switch (PATH[2]) {
                    case 1:
                        # code...
                        break;

                    default:
                        # code...
                        break;
                }
                $vacancies->createInfos($_POST,$_POST);
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
<<<<<<< HEAD
    case 'editarvaga' :
=======
<<<<<<< HEAD

=======
>>>>>>> 0872b59ce1c5cd9ce591c776059a18c2373e4ecb
 
    case 'editevagas' :
            switch ($request_method){
                case 'GET' :
                        require __DIR__ . '/View/editarVaga/editarVaga.php';
                        $home->showEditVacancies();
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
    case'editarvaga' :
<<<<<<< HEAD

    case 'editarvaga' :
        
=======
    case 'editarvaga' :
>>>>>>> 0872b59ce1c5cd9ce591c776059a18c2373e4ecb
>>>>>>> 7bacd3e23d16606dde657e349e1911fd8a88fec6
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
        $vacancies->selectInfos($buscando);
        break;
    default:
        http_response_code(404);
        // require __DIR__ . '/View/404.php';
        break;
}
?>
