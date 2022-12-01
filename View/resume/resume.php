<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cadastro do Curriculo</title>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html");?>
        <link rel="stylesheet" href="/View/assets/css/resumes/style.css">
        <script src="/Vendor/jquery-mask/jquery.mask.min.js"></script>
        <script src="/View/assets/js/resumes/main.js"></script>
        <script src="/Vendor/jquery-dropdown/js/jquery.dropdown.js"></script>
        <link rel="stylesheet" href="/Vendor/jquery-dropdown/css/jquery.dropdown.css">
    </head>
    <body>

        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/header-fixed.php");?>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php");?>
        <?php include_once("scholarities.php");?>
        <?php include_once("address.php");?>
        <?php include_once("time.php");?>
        <?php include_once("work_experiences.php");?>
        <?php include_once("address_work.php");?>
        <?php include_once("time_work.php");?>
        <?php include_once("abilitys.php");?>

    </body>
    <script src="/View/assets/js/resumes/dropdow.js"></script>
</html>