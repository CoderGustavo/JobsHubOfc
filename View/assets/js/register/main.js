$(()=>{
    let dataCompany, dataUser;


    $('#cnpj').mask('000.000.000/0000-00', {reverse: true});

    $('#min-cad, #max-cad').mask('000.000', {reverse: true});

    $('phone_number, #phone_number_company').mask('(00) 00000-0000');

    $('#date_foundation').mask('00/00/0000');

    function validaEMAIL (email){
        if(email){
            usuario = email.substring(0, email.indexOf("@"));
            dominio = email.substring(email.indexOf("@")+ 1);

            if ((usuario.length >=1) &&
                (dominio.length >=3) &&
                (usuario.search("@")==-1) &&
                (dominio.search("@")==-1) &&
                (usuario.search(" ")==-1) &&
                (dominio.search(" ")==-1) &&
                (dominio.search(".")!=-1) &&
                (dominio.indexOf(".") >=1)&&
                (dominio.lastIndexOf(".") < dominio.length - 1)) {
            return true
            }
            else{
            return false;
            }
        }
    }

    function validaCNPJ (cnpj) {
        if(cnpj){
            var b = [ 6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2 ]
            var c = String(cnpj).replace(/[^\d]/g, '')

            if(c.length !== 14)
                return false

            if(/0{14}/.test(c))
                return false

            for (var i = 0, n = 0; i < 12; n += c[i] * b[++i]);
            if(c[12] != (((n %= 11) < 2) ? 0 : 11 - n))
                return false

            for (var i = 0, n = 0; i <= 12; n += c[i] * b[i++]);
            if(c[13] != (((n %= 11) < 2) ? 0 : 11 - n))
                return false

            return true
        }
    }

    function validaSENHA(senha) {
        let regex = /^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%*()_+^&}{:;?.])(?:([0-9a-zA-Z!@#$%;*(){}_+^&])(?!\1)){6,}$/;
        return regex.test(senha)
    }

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }


    // Animação Inicial do getStarted
    $(".btn-comecar").on("click",(e)=>{
        $(".getStarted").css("transform", "translateX(-160%)");
        return false;
    });

    $('#access_account').on("click", (e)=>{
        e.preventDefault();

        console.log("AAA");

        let email=$('[name="email"]').val()
        let password=$('[name="password"]').val()

        if(email && password){
            let data = {
                email: $("input[name='email']").val(),
                password: $("input[name='password']").val(),
                con_password: $("input[name='con_password']").val()
            }

            let access_account = $.post("/login", data, 'json');

            access_account.done(function(response){
                response = JSON.parse(response);
                if(response.error){
                    $(".error_message").text(response.error);
                }else{
                    window.location.href="/";
                }
            });
        }else{
            $('.error_message').text("Preencha os campos")
        }

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('[name="photo_profile"]')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
            };
            reader.readAsDataURL(input.files[0]);
            return {error: false};
        }else{
            return {error: true, message: "Este arquivo não é uma imagem!"}
        }

    }

    $('[name="photo_profile"]').on("change", function(e){
        let res = readURL(this);

        if(res.error){
            $(".error_message").text(res.message);
            return;
        }

        setTimeout(() => {

            let result = $('[name="photo_profile"]').attr("src");

            dataCompany = {
                ...dataCompany,
                photo_profile: result,
            }

            console.log(dataCompany);

        }, 5000);

    });

    $("#cep").on("blur", function() {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                        dataCompany = {
                            ...dataCompany,
                            logradouro: dados.logradouro,
                            bairro: dados.bairro,
                            localidade: dados.localidade,
                            uf: dados.uf
                        }
                    }else {
                        limpa_formulário_cep();
                        $(".error_message").text("CEP não encontrado.");
                    }
                });
            } else {
                limpa_formulário_cep();
                $(".error_message").text("Formato de CEP inválido.");
            }
        } else {
            limpa_formulário_cep();
        }
    });

    // Send form data to the server to create a new account
    $("button[type='submit']#create_account").on("click", (e)=>{
        e.preventDefault();

        let data = {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            con_password: $("input[name='con_password']").val()
        }

        if(Object.values(data).filter(value=> value).length != Object.keys(data).length) {
            $(".error_message").text("Preencha todos os campos!");
            return;
        }

        if(!validaEMAIL(data.email)){
            $(".error_message").text("Preencha o E-mail corretamente!");
            return;
        }

        if(data.password != data.con_password) {
            $('.error_message').text("As senhas não coincidem!");
            return;
        }

        if(!validaSENHA (data.password)) {
            $('.error_message').text("Digite uma SENHA forte!");
            return;
        }

        let creating_account = $.post("/register", data, 'json');

        creating_account.done(function(response) {
            response = JSON.parse(response);
            if(response.error){
                $(".error_message").text(response.error);
            }else{
                $(".error_message").text(" ");
                $(".register-page").css("transform", "translateX(-160%)")
                $(".getName").css("transform", "translateX(-50%)")
            }
        });
    });

    $("button[type='submit']#create_account_company").on("click", (e)=>{
        e.preventDefault();

        let data = {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            con_password: $("input[name='con_password']").val()
        }

        if(Object.values(data).filter(value=> value).length != Object.keys(data).length) {
            $(".error_message").text("Preencha todos os campos!");
            return;
        }

        if(!validaEMAIL(data.email)){
            $(".error_message").text("Preencha o E-mail corretamente!");
            return;
        }

        if(!validaSENHA (data.password)) {
            $('.error_message').text("Digite uma SENHA forte!");
            return;
        }

        let creating_account = $.post("/register", data, 'json');

        creating_account.done(function(response) {
            response = JSON.parse(response);
            if(response.error){
                $(".error_message").text(response.error);
            }else{
                $(".error_message").text(" ");
                $(".register-page").css("transform", "translateX(-160%)")
                $("#cadastro").css("transform", "translateX(-50%)")
            }
        });
    });

    $("button[type='submit']#save_name").on("click", (e)=>{
        e.preventDefault();

        dataUser = {
            name: $("input[name='name']").val()
        }

        $(".name_user").html($("input[name='name']").val());
        $(".getName").css("transform", "translateX(-160%)");
        $(".getPhone").css("transform", "translateX(-50%)");

    });

    $("button[type='submit']#save_phone").on("click", (e)=>{
        e.preventDefault();

        dataUser = {
            ...dataUser,
            phone_number: $("input[name='phone_number']").val()
        }

        let telas = [".getPhone", ".getCep"]

        $(telas[0]).css("transform", "translateX(-160%)")
        $(telas[1]).css("transform", "translateX(-50%)")
    });


    $("button[type='submit']#save_end").on("click", (e)=>{
        e.preventDefault();

        let telas = [".getCep", ".finishedCad"]

        let create_vacancy = $.post("/atualizarconta", dataUser,'json')
        create_vacancy.done(function(response){
            response = JSON.parse(response);
            if(response.error){
                $(".error_message").html(response.error);
                return;
            }
            $(telas[0]).css("transform", "translateX(-160%)")
            $(telas[1]).css("transform", "translateX(-50%)")

            setTimeout(() => {
                window.location = "/login";
            }, 2000);
        });

    });

    $("button[type='submit']#cad-empresa-btn-button1").on("click", (e)=>{
        e.preventDefault();

        dataCompany = {
            name: $("input[name='nameCompany']").val(),
            cnpj: $("input[name='cnpj']").val(),
            phone_number: $('[name="phone_number"]').val()
        }


        console.log(dataCompany);

        if(Object.values(dataCompany).filter(value=> value).length != Object.keys(dataCompany).length) {
            $(".error_message").text("Preencha todos os campos!");
            return;
        }

        if(dataCompany.name.length < 3) {
            $('.error_message').text("Digite um nome com mínimo de 3 letras!")
            return;
        }

        if(!validaCNPJ(dataCompany.cnpj)) {
            $('.error_message').text("Digite um CNPJ válido!")
            return;
        }

        $("#cadastro").css("transform", "translateX(160%)")
        $("#informacoes").css("transform", "translateX(-50%)")
        $('.error_message').text(" ")

    });


    $("button[type='submit']#cad-empresa-btn-button").on("click", (e)=>{
        e.preventDefault();

        let date_foundation = $("[name='date_foundation']").val();
            date_foundation = date_foundation.split('/');
            date_foundation = date_foundation[2]+"-"+date_foundation[1]+"-"+date_foundation[0];

        dataCompany = {
            ...dataCompany,
            description: $('[name="description"]').val(),
            ceo: $('[name="ceo"]').val(),
            date_foundation: date_foundation
        }

        let create_vacancy = $.post("/cadastroempresa", dataCompany,'json')
        create_vacancy.done(function(response){
            response = JSON.parse(response);
            if(response.error){
                // $(".error_message").html(response.error);
            }else{
                $("#date").css("transform", "translateX(160%)");
                $("#vecancy-finish").css("transform", "translateX(-50%)");
            }
        });
    });
});
