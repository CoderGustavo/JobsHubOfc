<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html"); ?>
    <title>Buscando por ...</title>
    <script src="/View/assets/js/search/main.js"></script>
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/hero.php"); ?>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php"); ?>
    <div class="container topo">
        <h3>Buscando por: <?php echo explode("/", $_SERVER['REQUEST_URI'])[2]; ?></h3>
        <div class="btn btn-style1 btn-filtro">
            <img src="/View/assets/img/filtro.svg" alt="Filtro">
        </div>
    </div>
    <div class="container">
        
    </div>

</body>
</html>