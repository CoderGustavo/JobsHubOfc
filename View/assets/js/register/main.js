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
        $.post("/cadastro", data)
        .done((response)=>{
            console.log(response)
        })
        .fail((response)=>{
            console.log("Fail")
            $(".error_message").html(response.error)
        });
    })
});