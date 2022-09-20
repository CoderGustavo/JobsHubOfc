<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html"); ?>
    <title>cadastro</title>
    <link rel="stylesheet" href="View/assets/css/register/style.css">
    <script src="View/assets/js/register/main.js"></script>
</head>
<body>
    <div class="getStarted bg-color4">
        <h1 class="p-2">
            SEU FUTURO JOB ESTÁ AQUI
        </h1>
        <a href="" class="btn btn-pill btn-light2op8 btn-comecar">
            <span>Começar</span>
        </a>
        <div class="blur1"></div>
        <div class="blur2"></div>
        <div class="blur3"></div>
    </div>

    <div class="container-fluid register-page">
            <h2>BEM-VINDO</h2>
            <h3>Aqui sua experiência será diferente,
                crie sua conta para começar!</h3>
            <div class="social-sign-up">
                <a href="">
                    <img src="View/assets/img/google-logo.png" alt="">
                </a>
            </div>
            <div class="or-separate">
                <span>OU</span>
                <div class="dash"></div>
            </div>
            <div class="inputs">
                <div class="input-group">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="">
                </div>
                <div class="input-group">
                    <label for="password">Senha: </label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="input-group">
                    <label for="con_password">Confirmar senha: </label>
                    <input type="password" name="con_password" id="con_password ">
                </div>
            </div>

    </div>
</body>
</html>