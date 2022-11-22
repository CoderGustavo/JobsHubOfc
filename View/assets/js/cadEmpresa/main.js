$(()=>{
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
    function validaSENHA(senha){
        if(senha){
            
        }
    }

    $('#cnpj').mask('000.000.000/0000-00', {reverse: true});
    
    $('#min-cad, #max-cad').mask('000.000', {reverse: true});

    // $('#open-date , #close-date').mask('00/00/0000');

    $("button[type='submit']#cad-empresa-btn-button1").on("click", (e)=>{
        e.preventDefault();
        
        let name=$('[name="name"]').val()
        let cnpj=$('[name="cnpj"]').val()
        let email=$('[name="email"]').val()
        let senha=$('[name="password"]').val()

        if(name && cnpj && email && senha){
            if(validaCNPJ(cnpj)){
                if(validaEMAIL (email)){
                    $("#cadastro").css("transform", "translateX(100%)")
                    $("#informacoes").css("transform", "translateX(0)")
                    $('.error_message').text("")
                }else{
                    $('.error_message').text("E-mail incorreto")
                }
            }else{
                $('.error_message').text("CNPJ incorreto")
            }
        } 
        else{
            $('.error_message').text("Preencha todos os campos obrigatórios")
        }        
    });

    $("button[type='submit']#cad-empresa-btn-button2").on("click", (e)=>{
        e.preventDefault();

        $("#informacoes").css("transform", "translateX(-100%)")
        $("#final").css("transform", "translateX(0)")
    });

    $("button[type='submit']#cad-empresa-btn-button").on("click", (e)=>{
        e.preventDefault(); 

        let date_foundation = $("[name='date_foundation']").val();
           date_foundation = date_foundation.split('/');     
           date_foundation = date_foundation[2]+"-"+date_foundation[1]+"-"+date_foundation[0];

        let data = {
            name: $("[name ='name']").val(),
            cnpj: $('[name="cnpj"]').val(),
            email: $('[name="email"]').val(),
            password: $('[name="password"]').val(),
            phone_number: $('[name="phone_number"]').val(),
            photo_profile: $('[name="photo_profile"]').val(),    
            description: $('[name="description"]').val(),   
            ceo: $('[name="ceo"]').val(),
            date_foundation: date_foundation   
        }

        let create_vacancy = $.post("/cadastroempresa", data,'json')
        create_vacancy.done(function(response){
            response = JSON.parse(response);
            if(response.error){
                // $(".error_message").html(response.error);
            }else{
                $("#date").css("transform", "translateX(-100%)");
                $("#vecancy-finish").css("transform", "translateX(0)");
            }
        });
    });
})

