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
            <img class="verificado" src="/View/assets/img/verificado.svg" alt="Verificado">
        </div>
        <div class="perfil-informacao">
            <img class="perfil" src="/View/assets/img/paisagem.png" alt="Foto Perfil">
            <div class="container-informacoes">
                <span>Funcionários: 1000</span>
                <span>Vagas abertas</span>
                <span>Avaliações: 5 estrelas</span>
                <span>Salário médio: R$3.200</span>
            </div>
        </div>        
        <h1>Nome - CEO</h1>
        <div class="card-seguir">
            <span>Seguir</span>
            <div class="card-seguidores">
                <img src="/View/assets/img/boneco.svg" alt="Boneco">
                <span>100K</span>
            </div>
        </div>
    </div>
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
            <h4>Combina 95% com seu perfil</h4>
        </div>
    </div>
</body>
</html>