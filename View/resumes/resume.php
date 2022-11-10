<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cadastro de Vagas</title>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html");?>
        <link rel="stylesheet" href="/View//assets/css/resumes/style.css">
        <script src="/Vendor/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
        <script src="/View/assets/js/resumes/main.js"></script>
    </head>
    <body>

        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/header-fixed.html");?>
        <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php");?>
        <?php include_once("actual_job.php");?>
        <?php include_once("scholarities.php");?>
        <?php include_once("work_experiences.php");?>

    </body>
</html>