<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mostrar Vagas</title>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html"); ?>
    <link rel="stylesheet" href="/View/assets/css/mosVagas/style.css">
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php"); ?>
    <div class="mosVagas">
        <img src="/View/assets/img/logo.png" alt="Logo">
        <h1>Vagas Favoritas</h1>
        <div class="col-12 col-md-3">
            <div class="card-vaga">
                <div class="vaga-line-one"> 
                    <h2>Nome da Vaga</h2>   
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
    </div>
</body>
</html>