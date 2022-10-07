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
        <h3>Buscando por: ...</h3>
        <div class="btn btn-style1 btn-filtro">
            <img src="/View/assets/img/filtro.svg" alt="Filtro">
        </div>
    </div>
    <div class="container vagas">
        <div class="card-vaga">
            <div class="vaga-line-one">
                <h2>Vaga para front-end</h2>
                <span>5/10</span>
            </div>
            <div class="vaga-line-two">
                <div class="vaga-hab">
                    <h4>Habilidades obrigatórias:</h4>
                    <div class="vaga-habs">
                        <span>HTML</span>
                        <span>CSS</span>                        
                        <span>JS</span>
                    </div>
                </div>
                <h4>Combina 95% com seu perfil</h4>
            </div>
        </div>
    </div>

</body>
</html>