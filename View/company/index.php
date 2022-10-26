<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html"); ?>
    <link rel="stylesheet" href="/View/assets/css/company/style.css">
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php"); ?>
    <div class="hero hero-empresa">
        <div class="img-empresa">
            <img src="/View/assets/img/nome-empresa.png" alt="Logo Empresa">
            <i class="fal fa-check"></i>
        </div>
        <div class="usuario-informacao container">
            <div class="nome-foto">
                <img class="perfil" src="/View/assets/img/paisagem.png" alt="Foto Perfil">
                <h1>Nome - CEO</h1>        
            </div>
            <div class="cards-right">
                <div class="container-informacoes">
                    <span>Funcionários: 1000</span>
                    <span>Vagas abertas</span>
                    <span>Avaliações: 5 estrelas</span>
                    <span>Salário médio: R$3.200</span>
                </div>
                <div class="card-seguir">
                    <span>Seguir</span>
                    <div class="card-seguidores">
                        <i class="fal fa-user-friends"></i>
                        <span>100K</span>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <div class="container">
        <div class="cards">
            <span>Informações Gerais</span>
            <span>Vagas abertas</span>
            <span>Salários por área</span>      
        </div>
        <div class="text">
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Se
            did dolor in turpis rutrum convallis id quis augue. Integer
            euismod sit amet arcu in pretium. Cras tincidunt malesuad
            a massa vulputate tempus. Praesent quis nisl a metus sagit
            tis rhoncus. Mauris sit amet rutrum ipsum, vel placerat sem
            Nunc luctus faucibus dapibus. Morbi at elit at tellus venena
            tis gravida. Quisque cursus rhoncus fringilla.</span> 
    
            <span id="span2">Cras dui neque, interdum ac aliquet vitae, dapibus vel quam
            Nullam neque nisi, sollicitudin ut metus a, efficitur ultrices
            elit. Integer mauris sapien, porta molestie sollicitudin vel </span>
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
    </div>
</body>
</html>