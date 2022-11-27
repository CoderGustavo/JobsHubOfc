<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html"); ?>
    <link rel="stylesheet" href="/View/assets/css/profile/style.css">
    <link rel="stylesheet" href="/View/assets/css/company/style.css">
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
                <h1><?php //echo $user["name"]; ?> aaaa</h1>
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
    </div>
</body>
</html>