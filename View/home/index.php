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
            <h3>Áreas em alta</h3>
            <img src="/View/assets/img/icons/homeemalta.svg">
        </div>
        <div class="slideemalta">
            <div class="element_slide">
                <div class="bg-color5 area">
                    <div>
                        <img src="/View/assets/img/icons/iconemalta.svg">
                    </div>
                </div>
                <h4 class="titleslide">FRONT-END</h4>
            </div>
            <div class="element_slide">
                <div class="bg-color5 area">
                    <div>
                        <img src="/View/assets/img/icons/iconemalta.svg">
                    </div>
                </div>
                <h4 class="titleslide">FRONT-END</h4>
            </div>
            <div class="element_slide">
                <div class="bg-color5 area">
                    <div>
                        <img src="/View/assets/img/icons/iconemalta.svg">
                    </div>
                </div>
                <h4 class="titleslide">FRONT-END</h4>
            </div>
            <div class="element_slide">
                <div class="bg-color5 area">
                    <div>
                        <img src="/View/assets/img/icons/iconemalta.svg">
                    </div>
                </div>
                <h4 class="titleslide">FRONT-END</h4>
            </div>
            <div class="element_slide">
                <div class="bg-color5 area">
                    <div>
                        <img src="/View/assets/img/icons/iconemalta.svg">
                    </div>
                </div>
                <h4 class="titleslide">FRONT-END</h4>
            </div>
            <div class="element_slide">
                <div class="bg-color5 area">
                    <div>
                        <img src="/View/assets/img/icons/iconemalta.svg">
                    </div>
                </div>
                <h4 class="titleslide">FRONT-END</h4>
            </div>
            <div class="element_slide">
                <div class="bg-color5 area">
                    <div>
                        <img src="/View/assets/img/icons/iconemalta.svg">
                    </div>
                </div>
                <h4 class="titleslide">FRONT-END</h4>
            </div>
        </div>
    
        <div class="homeemalta">
            <h3>Top vagas</h3>
            <i class="fal fa-stars"></i>
        </div>
        <div>
            <div class="row vagas pt-0">
                <div class="col-11 col-md-3">
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
                            <h4>95%</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="homeemalta">
            <h3>Todas as vagas</h3>
        </div>
        <div class="row vagas pt-0">
            <?php foreach ($vagas as $key => $vaga): ?>
            <div class="col-12 col-md-3">
                <div class="card-vaga">
                    <div class="vaga-line-one">
                        <h2><?php echo $vaga["name"]; ?></h2>
                        <span>1/<?php echo $vaga["qtd_max_cand"]; ?></span>
                    </div>
                    <div class="vaga-line-two">
                        <div class="vaga-hab">
                            <h4>Habilidades obrigatórias:</h4>
                            <div class="vaga-habs">
                                <?php foreach (explode(";", $vaga["required_abilities"]) as $key => $ability): ?>
                                    <span><?php echo $ability?></span>
                                <?php endforeach?>
                            </div>
                        </div>
                        <h4>95%</h4>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
    
</body>
</html>