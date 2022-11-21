$(()=>{
    // Animação Inicial do getStarted
    $(".btn-comecar").on("click",(e)=>{
        $(".getStarted").css("transform", "translateX(-100%)");
        return false;
    });

    $('#access_account').on("click", (e)=>{
        e.preventDefault();

        let email=$('[name="email"]').val()
        let password=$('[name="password"]').val()

        if(email&& password){
            if(email){
                
            }
            let data = {
                email: $("input[name='email']").val(),
                password: $("input[name='password']").val(),
                con_password: $("input[name='con_password']").val()
            }

            let access_account = $.post("/logar", data, 'json');

            access_account.done(function(response){
                response = JSON.parse(response);
                if(response.error){
                    $(".error_message").html(response.error);
                }else{
                    window.location.href="/";
                }
            });
        }else{
            $('.error_message').text("Preencha os campos")   
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

        let creating_account = $.post("/register", data, 'json');

        creating_account.done(function(response) {
            response = JSON.parse(response);
            if(response.error){
                $(".error_message").html(response.error);
            }else{
                $(".register-page").css("transform", "translateX(-100%)")
                $(".getName").css("transform", "translateX(0)")
            }
        });
    });
    
    $("button[type='submit']#save_name").on("click", (e)=>{
        e.preventDefault();

        $(".name_user").html($("input[name='name']").val());
        $(".getName").css("transform", "translateX(-100%)");
        $(".getPhone").css("transform", "translateX(0)");

    });

    $("button[type='submit']#save_phone").on("click", (e)=>{
        e.preventDefault();

        let data = {
            name: $("input[name='name']").val(),
            phone_number: $("input[name='phone_number']").val()
        }

        let addInfosToAccount = $.post("/atualizar_conta", data, 'json');

        addInfosToAccount.done(function(response) {
            response = JSON.parse(response);
            if(response.error){
                $(".error_message").html(response.error);
            }else{
                $(".getPhone").css("transform", "translateX(-100%)")
                $(".confirmEmail").css("transform", "translateX(0)")
            }
        });
    });

    $("button[type='submit']#save_email").on("click", (e)=>{
        e.preventDefault();
        let data = {
            name: $("input[name='name']").val(),
            phone_number: $("input[name='phone_number']").val()
        }

        let addInfosToAccount = $.post("/cadastro", data, 'json');

        addInfosToAccount.done(function(response) {
            response = JSON.parse(response);
            if(response.error){
                $(".error_message").html(response.error);
            }else{
                $(".confirmEmail").css("transform", "translateX(-100%)")
                $(".getCep").css("transform", "translateX(0)")
            }
        });

    });

    $("button[type='submit']#save_end").on("click", (e)=>{
        e.preventDefault();

        $(".getCep").css("transform", "translateX(-100%)")
        $(".finishedCad").css("transform", "translateX(0)")

        setTimeout(() => {
            window.location = "/";
        }, 2000);
    });
});