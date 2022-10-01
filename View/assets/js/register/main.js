$(()=>{
    // Animação Inicial do getStarted
    $(".btn-comecar").on("click",(e)=>{
        $(".getStarted").css("transform", "translateX(-100%)");
        return false;
    });

    // Send form data to the server to create a new account
    $("button[type='submit']#create_account").on("click", (e)=>{
        e.preventDefault();
        let data = {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            con_password: $("input[name='con_password']").val()
        }
        $(".register-page").css("transform", "translateX(-100%)")
        $(".getName").css("transform", "translateX(0)")
        // $.post("/cadastro", data)
        // .done((response)=>{
        //     console.log(response)
        // })
        // .fail((response)=>{
        //     console.log("Fail")
        //     $(".error_message").html(response.error)
        // });
    });
    
    
    $("button[type='submit']#save_name").on("click", (e)=>{
        e.preventDefault();
        let data = {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            con_password: $("input[name='con_password']").val()
        }
        $(".getName").css("transform", "translateX(-100%)")
        $(".getPhone").css("transform", "translateX(0)")
    });

    $("button[type='submit']#save_phone").on("click", (e)=>{
        e.preventDefault();
        let data = {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            con_password: $("input[name='con_password']").val()
        }
        $(".getPhone").css("transform", "translateX(-100%)")
        $(".confirmEmail").css("transform", "translateX(0)")
    });

    $("button[type='submit']#save_email").on("click", (e)=>{
        e.preventDefault();
        let data = {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            con_password: $("input[name='con_password']").val()
        }
        $(".confirmEmail").css("transform", "translateX(-100%)")
        $(".getCep").css("transform", "translateX(0)")
    });

    $("button[type='submit']#save_end").on("click", (e)=>{
        e.preventDefault();
        let data = {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            con_password: $("input[name='con_password']").val()
        }
        $(".getCep").css("transform", "translateX(-100%)")
        $(".finishedCad").css("transform", "translateX(0)")
    });
});