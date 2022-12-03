<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html");?>
    <title>Hub</title>
    <link rel="stylesheet" href="/View/assets/css/hub/style.css">
    <script src="/View/assets/js/hub/main.js"></script>
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/header-fixed.php");?>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php");?>
    <input type="hidden" name="id_vacancy" value="<?php echo $path[2]?>">
    <div class="hub">
        <div class="container container-hub">
            <div class="title">
                <h1><?php echo $vaga[0]["name"] ?></h1>
                    <h4>Candidatos <?php echo $vaga[0]['qtd_total'] . " / " . $vaga[0]['qtd_max_cand'] ?></h4>
            </div>
            <div class="sobre-vaga">
                <h5>Sobre a vaga:</h5>
                <p>
                    <?php echo $vaga[0]["full_desc"] ?>
                </p>
            </div>
            <div class="hab-obrigatorias">
                <h5>Habilidades obrigatórias: </h5>
                <div class="vaga-habs vaga-habs-hub">
                    <?php foreach ($vaga[0]["vacancy_required_abilities"] as $key => $ability): ?>
                        <span><?php echo $ability["ability"]?></span>
                    <?php endforeach?>
                </div>
            </div>
            <div class="hab-diferenciais">
                <h5>Habilidades diferenciais: </h5>
                <div class="vaga-habs vaga-habs-hub">
                    <?php foreach ($vaga[0]["vacancy_difference_abilities"] as $key => $ability): ?>
                        <span><?php echo $ability["ability"]?></span>
                    <?php endforeach?>
                </div>
            </div>
            <div class="title-combinacao">Esta vaga combina 95% com você</div>
            <div class="bar-combinacao"></div>
        </div>
    </div>
    <div class="card-like">

    </div>
    <div class="card-unlike">
        <span></span>
    </div>
</body>
</html>
