<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cadastro de Vagas</title>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html");?>
        <link rel="stylesheet" href="/View//assets/css/editVaga/style.css">
        <script src="/Vendor/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
        <script src="/View/assets/js/editVaga/main.js"></script>
    </head>
    <body>

        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/header-fixed.html");?>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php");?>
        <?php include_once("cadastro.php");?>
        <?php include_once("salary.php");?>
        <?php include_once("vecancy-type.php");?>
        <?php include_once("date.php");?>
        <?php include_once("vecancy-finish.php");?>

    </body>
</html>