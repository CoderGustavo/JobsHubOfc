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


// initialize classes below:
$home = new HomeController();
$user = new UserController();
$vacancies = new VacancyController();

// switch (PATH[1]) {
//     case "login" :
//     case "cadastro" :
//         if($_SESSION['user']){
//             header("Location: /");
//         }
//         break;
// }

switch (PATH[1]) {
    case '/' :
    case '' :
        $home->showHomePage();
        break;
    case 'logar' :
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
    case 'cadastro' :
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
        if($path[2]) require __DIR__ . '/View/search/index.php';
        else header('Location: /');
        break;
    case 'hub' :
        $home->showHubPage($path[2]);

        break;
    case 'cadastrovagas' :
        switch ($request_method){
            case 'GET' :
                require __DIR__ . '/View/cadVaga/cadvaga.php';
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
    case 'atualizar_conta' :
        // print_r($_SESSION['user']);
        $user->updateInfos($_SESSION["user"], $_POST);
        break;
    case 'empresa' :
        switch ($request_method){
            case 'GET' :
                $home->showCompanyPage();
                break;
            default :
                http_response_code(405);
                $home->showError(405);
                break;
        }
        break;
    case 'perfil' :
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