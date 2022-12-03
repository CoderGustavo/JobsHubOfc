<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html");?>
    <title>JobsHub</title>
    <link rel="stylesheet" href="/View/assets/css/home/style.css">
    <script src="/View/assets/js/search/main.js"></script>
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/hero.php");?>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php");?>

    <main class="container">
        <div class="homeemalta">
            <h3>Habilidades mais procuradas</h3>
            <img src="/View/assets/img/icons/homeemalta.svg">
        </div>
        <div class="slideemalta">
            <?php foreach ($habilidadesEmAlta as $habilidades): ?>
            <div class="element_slide">
                <div class="bg-color5 area">
                    <div>
                        <img src="/View/assets/img/icons/iconemalta.svg">
                    </div>
                </div>
                <h4 class="titleslide"><?php echo $habilidades['ability']?></h4>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="homeemalta">
            <h3>Top vagas</h3>
            <i class="fal fa-stars"></i>
        </div>

        <div class="slideemalta">
            <?php foreach ($vagasEmAlta as $vaga): ?>
                <div class="element_slide el_vagas vagas">
                    <a href="/hub/<?php echo $vaga["id_vacancy"]?>" class="card-vaga">
                        <div class="vaga-line-one">
                            <h2>Vaga para front-end</h2>
                            <span><?php echo $vaga["qtd_total"][0]["qtd_max"]?>/<?php echo $vaga["qtd_max_cand"]; ?></span>
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
                            <h4>95%</h4>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="homeemalta">
            <h3>Todas as vagas</h3>
        </div>
        <div class="row vagas pt-0">
            <?php foreach ($vagas as $key => $vaga): ?>
            <div class="col-12 col-md-6">
                <a href="/hub/<?php echo $vaga["id_vacancy"]?>" class="card-vaga">
                    <div class="vaga-line-one">
                        <h2><?php echo $vaga["name"]; ?></h2>
                        <span><?php echo $vaga["qtd_total"]?>/<?php echo $vaga["qtd_max_cand"]; ?></span>
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
                        <h4>95%</h4>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>
