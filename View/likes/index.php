<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mostrar Vagas</title>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html"); ?>
    <link rel="stylesheet" href="/View/assets/css/likes/style.css">
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/header-fixed.php");?>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php");?>
    <div class="container mosVagas">
        <h1>Vagas Curtidas</h1>
        <div class="row vagas pt-0">
            <?php foreach ($vagas as $key => $vaga): ?>
            <div class="col-12 col-md-4">
                <a href="/hub/<?php echo $vaga["id_vacancy"]?>" class="card-vaga">
                    <div class="vaga-line-one">
                        <h2><?php echo $vaga["name"]; ?></h2>
                        <span>1/<?php echo $vaga["qtd_max_cand"]; ?></span>
                    </div>
                    <div class="vaga-line-two">
                        <div class="vaga-hab">
                            <h4>Habilidades obrigatórias:</h4>
                            <div class="vaga-habs">
                                <?php foreach ($vaga["vacancy_required_abilities"] as $key => $ability): ?>
                                    <span><?php echo $ability["ability"]?></span>
                                <?php endforeach?>
                            </div>
                        </div>
                        <h4>Etapa <?php echo $vaga["id_vacancy_status"]?></h4>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
