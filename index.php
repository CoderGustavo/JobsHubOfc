<?php

$path = explode("/", $_SERVER['REQUEST_URI']);
$request_method = $_SERVER['REQUEST_METHOD'];
$GLOBALS["path"] = $path;
define("ROOT", $_SERVER['DOCUMENT_ROOT']);

// include classes below:
require_once(__DIR__ . '/Controller/HomeController.php');
// require_once(__DIR__ . '/Controller/UserController.php');

// initialize classes below:
$home = new HomeController();
// $user = new UserController();

switch ($path[1]) {
    case '/' :
    case '' :
        require __DIR__ . '/View/home/index.php';
        break;
    case 'logar' :
        require __DIR__ . '/View/login/index.php';
        break;
    case 'cadastro' :
        switch ($request_method){
            case 'GET' :
                $home->showRegisterPage();
                break;
            case 'POST' :
                $email = $_POST['email'];
                $password = $_POST['password'];
                $conf_password = $_POST['con_password'];
                // $user->register($email, $password, $con_password);
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
    default:
        http_response_code(404);
        // require __DIR__ . '/View/404.php';
        break;
}
?>