<?php

$path = explode("/", $_SERVER['REQUEST_URI']);
$request_method = $_SERVER['REQUEST_METHOD'];
$GLOBALS["path"] = $path;

switch ($path[1]) {
    case '/' :
    case '' :
        require __DIR__ . '/View/home/index.php';
        break;
    case 'logar' :
        require __DIR__ . '/View/register/index.php';
        break;
    case 'cadastro' :
        require __DIR__ . '/View/register/index.php';
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