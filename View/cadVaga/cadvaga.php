<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cadastro de Vagas</title>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html");?>
        <link rel="stylesheet" href="/View/assets/css/cadVagas/style.css">

        <script src="/Vendor/jquery-mask/jquery.mask.min.js"></script>
        <script src="/View/assets/js/cadVagas/main.js"></script>

        <script src="/Vendor/jquery-dropdown/js/jquery.dropdown.js"></script>
        <link rel="stylesheet" href="/Vendor/jquery-dropdown/css/jquery.dropdown.css">
    </head>
    <body>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/header-fixed.php");?>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php");?>
        <?php include_once("cadastro.html");?>
        <?php include_once("salary.html");?>
        <?php include_once("vecancy-type.php");?>
        <?php include_once("date.html");?>
        <?php include_once("vecancy-finish.html");?>
    </body>
</html>
