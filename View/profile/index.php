<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html"); ?>
    <link rel="stylesheet" href="/View/assets/css/profile/style.css">
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php"); ?>
    <div class="hero hero-profile">
        <div class="perfil-informacao container">
            <div class="nome-foto">
                <img src="/View/assets/img/paisagem.png" alt="Foto Perfil">
                <h1><?php echo $user["name"]; ?> aaaa</h1>
            </div>
            <div class="cards-right">
                <div class="container-informacoes">
                    <span>Jacutinga - MG/Brasil</span>
                    <span>Experiências: <?php echo $user["total_work_experiences"]; ?> </span>
                    <span>Habilidades: <?php echo $user["total_abilities"]; ?> </span>
                    <span>Avaliação: <?php echo $user["total_stars"]; ?> <i class="fas fa-star"></i></span>
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
                <a href="#profile-<?php echo $vaga["id_vacancy"]?>">
                    Informações Gerais
                </a>
                <a href="#profile-<?php echo $vaga["id_vacancy"]?>">
                    Informações Gerais
                </a>
                <a href="#profile-<?php echo $vaga["id_vacancy"]?>">
                    Informações Gerais
                </a>
                <a href="#profile-<?php echo $vaga["id_vacancy"]?>">
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