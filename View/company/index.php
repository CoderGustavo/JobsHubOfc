<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html"); ?>
    <link rel="stylesheet" href="/View/assets/css/profile/style.css">
    <link rel="stylesheet" href="/View/assets/css/company/style.css">
    <script src="/View/assets/js/company/main.js"></script>
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php"); ?>
    <div class="hero hero-company">
        <div class="img-empresa">
            <img src="/View/assets/img/nome-empresa.png" alt="Logo Empresa">
            <i class="fal fa-check"></i>
        </div>
        <div class="perfil-informacao container">
            <div class="nome-foto">
                <img src="/View/assets/img/paisagem.png" alt="Foto Perfil">
                <h1><?php print_r($company["name"]) ?></h1>
            </div>
            <div class="cards-right">
                <div class="container-informacoes">
                    <span>Funcionários: 1000</span>
                    <span>Vagas abertas: 10</span>
                    <span>Avaliação: 5 estrelas</span>
                    <span>Salário médio: R$3.200</span>
                </div>
                <div class="card-seguir">
                    <a href="#">Seguir</a>
                    <div class="card-seguidores">
                        <i class="fal fa-user-friends"></i>
                        <span>100K</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="slideemalta">
            <div class="element_slide vagas cards">
                <a href="#profile-<?php //echo $vaga["id_vacancy"]?>">
                    Informações Gerais
                </a>
                <a href="#profile-<?php //echo $vaga["id_vacancy"]?>">
                    Informações Gerais
                </a>
                <a href="#profile-<?php //echo $vaga["id_vacancy"]?>">
                    Informações Gerais
                </a>
                <a href="#profile-<?php //echo $vaga["id_vacancy"]?>">
                    Informações Gerais
                </a>
            </div>
        </div>
        <div class="text">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Se
            did dolor in turpis rutrum convallis id quis augue. Integer
            euismod sit amet arcu in pretium. Cras tincidunt malesuad
            a massa vulputate tempus. Praesent quis nisl a metus sagit
            tis rhoncus. Mauris sit amet rutrum ipsum, vel placerat sem
            Nunc luctus faucibus dapibus. Morbi at elit at tellus venena
            tis gravida. Quisque cursus rhoncus fringilla.</p>

            <p>Cras dui neque, interdum ac aliquet vitae, dapibus vel quam
            Nullam neque nisi, sollicitudin ut metus a, efficitur ultrices
            elit. Integer mauris sapien, porta molestie sollicitudin vel </p>
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
                        <div href="" id="<?php echo $vaga["id_vacancy"]?>" class="removerVaga">Excluir</div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
