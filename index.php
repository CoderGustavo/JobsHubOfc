<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
    case '' :
        require __DIR__ . '/View/inicio/index.php';
        break;
    case '/logar' :
        require __DIR__ . '/View/register/index.php';
        break;
    case '/cadastro' :
        require __DIR__ . '/View/register/index.php';
        break;
    case '/buscando' :
        require __DIR__ . '/View/search/index.php';
        break;
    default:
        http_response_code(404);
        // require __DIR__ . '/View/404.php';
        break;
}
?>