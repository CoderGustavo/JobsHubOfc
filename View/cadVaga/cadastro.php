<!DOCTYPE html>
    <title>Cadastro de Vagas</title>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/head.html");?>
    <link rel="stylesheet" href="/View/assets/css/cadVagas/style.css">
</head>
<body>

    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/header-fixed.html");?>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/View/assets/templates/navbar-mobile.php");?>
 
    <div class="container cad-vaga">
        <div class="title-page">
            <h1>Cadastrando vaga</h1>
            <h2>Preencha os campos abaixo: </h2>
        </div>

        <div class="inputs">

            <div class="input-group">
                <label for="">Nome</label>
                <input type="text" name="cad-name">
            </div>
            
            <div class="input-group">
                <label for="">Pequena Descrição</label>
                <input type="text" name="cad-short-desc">
            </div>

            <div class="input-group">
                <label for="">Salário Mínimo</label>
                <input type="text" id="min-salary">
            </div>
            
            <div class="input-group">
                <label for="">.</label>
                <input type="text" name="#" id="#">
            </div>
            <div class="input-group">
                <label for="">.</label>
                <input type="text" name="#" id="#">
            </div>

        </div>
    </div>

    <script src="/View/assets/js/cadVagas/main.js"></script>
</body>
</html>