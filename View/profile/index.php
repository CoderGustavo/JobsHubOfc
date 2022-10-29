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
                <h1><?php echo $user["name"]; ?></h1>
            </div>
            <div class="cards-right">
                <div class="container-informacoes">
                    <span>Jacutinga - MG/Brasil</span>
                    <span>Experiências: 2</span>
                    <span>Habilidades: 10</span>
                    <span>Avaliação: 5 estrelas</span>
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
            <div class="p-2">
                <span>Informações Gerais</span>
            </div>
            <div class="p-2">
                <span>Informações Gerais</span>
            </div>
            <div class="p-2">
                <span>Informações Gerais</span>
            </div>
            <div class="p-2">
                <span>Informações Gerais</span>
            </div>
            <div class="p-2">
                <span>Informações Gerais</span>
            </div>
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
    </div>
</body>
</html>